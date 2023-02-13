<?php
$table = 'users';
$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
Page::set_title('Data Pengguna');

$fields = [
    'name' => [
        'label' => 'Nama',
        'type'  => 'text',
        'search' => true
    ], 
    'username' => [
        'label' => 'Username',
        'type'  => 'text',
        'search' => true
    ], 
    'role' => [
        'label' => 'Role',
        'type'  => 'text'
    ]
];

$datas = [];

if(isset($_GET['draw']))
{
    $draw    = $_GET['draw'];
    $start   = $_GET['start'];
    $length  = $_GET['length'];
    $search  = $_GET['search']['value'];
    $order   = $_GET['order'];
    
    $columns = [];
    $search_columns = [];
    foreach($fields as $key => $field)
    {
        $columns[] = is_array($field) ? $key : $field;
        if(is_array($field) && isset($field['search']) && !$field['search']) continue;
        $search_columns[] = is_array($field) ? $key : $field;
    }

    $where = "";

    if(!empty($search))
    {
        $_where = [];
        foreach($search_columns as $col)
        {
            $_where[] = "$col LIKE '%$search%'";
        }

        $where = "WHERE (".implode(' OR ',$_where).")";
    }

    $col_order = $order[0]['column']-1;
    $col_order = $col_order < 0 ? 'id' : $columns[$col_order];

    $db->query = "SELECT *, (SELECT role_id FROM user_roles WHERE user_id = users.id) as role_id, (SELECT name FROM roles WHERE id=role_id) as role FROM $table $where ORDER BY ".$col_order." ".$order[0]['dir']." LIMIT $start,$length";
    $data  = $db->exec('all');

    $total = $db->exists($table,$where,[
        $col_order => $order[0]['dir']
    ]);

    $results = [];
    
    foreach($data as $key => $d)
    {
        $results[$key][] = $start+$key+1;
        foreach($columns as $col)
        {
            $field = '';
            if(isset($fields[$col]))
            {
                $field = $fields[$col];
            }
            else
            {
                $field = $col;
            }
            $data_value = "";
            if(is_array($field))
            {
                $data_value = Form::getData($field['type'],$d->{$col},true);
                if($field['type'] == 'number')
                {
                    $data_value = number_format($data_value);
                }

                if($field['type'] == 'file')
                {
                    $data_value = '<a href="'.asset($data_value).'" target="_blank">Lihat File</a>';
                }
            }
            else
            {
                $data_value = $d->{$field};
            }

            $results[$key][] = $data_value;
        }

        $action = '';
        if(file_exists('../actions/'.$table.'/action-button.php'))
        {
            // $table, $d (data object)
            $action .= require '../actions/'.$table.'/action-button.php';
        }
        if(is_allowed(get_route_path('users/edit',[]),auth()->user->id)):
            $action .= '<a href="'.routeTo('users/edit',['id'=>$d->id]).'" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>';
        endif;
        if(is_allowed(get_route_path('users/delete',[]),auth()->user->id)):
            $action .= '<a href="'.routeTo('users/delete',['id'=>$d->id]).'" onclick="if(confirm(\'apakah anda yakin akan menghapus data ini ?\')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>';
        endif;
        $results[$key][] = $action;
    }

    echo json_encode([
        "draw" => $draw,
        "recordsTotal" => (int)$total,
        "recordsFiltered" => (int)$total,
        "data" => $results
    ]);

    die();
}

return compact('datas','success_msg');