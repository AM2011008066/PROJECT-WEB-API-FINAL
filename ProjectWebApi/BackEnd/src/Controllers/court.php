<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include courtProc.php file
include __DIR__ . '/function/courtProc.php';

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

// //use cors
   $app->add(function ($req, $res, $next) {
   $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});




//-----------------------------------------------ADMIN SIDE-------------------------------------------------------------


//read table admin
$app->get('/admin', function (Request $request, Response $response, array $arg)
{
    return $this->response->withJson(array('data' => 'success'), 200);
});

// read all data from table admin
$app->get('/alladmin',function (Request $request, Response $response, array $arg)
{
    $data = getAllAdmin($this->db);
    if (is_null($data)) 
    {
        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
    }

    return $this->response->withJson(array('data' => $data), 200);
});
//request table admin by condition (admin id)
$app->get('/admin/[{id}]', function ($request, $response, $args){
    $adminId = $args['id'];
    if (!is_numeric($adminId)) {
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
}

//GET Method
$data = getAdmin($this->db,$adminId);
if (empty($data)) {
return $this->response->withJson(array('error' => 'no data'), 500);
}
return $this->response->withJson(array('data' => $data), 200);
});

//POST Method
$app->post('/admin/add', function ($request, $response, $args)
 {
    $form_data = $request->getParsedBody();
    $data = createAdmin($this->db, $form_data);
    if (is_null($data)) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
    );

//DELETE Method
//delete row
$app->delete('/admin/del/[{id}]', function ($request, $response, $args){
    $adminId = $args['id'];
    if (!is_numeric($adminId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $data = deleteMin($this->db,$adminId);
    if (empty($data)) {
    return $this->response->withJson(array($adminId=> 'is successfully deleted'), 202);};
    });
    
//put table Admin
$app->put('/admin/put/[{id}]', function ($request, $response, $args){
    $adminId = $args['id'];
    if (!is_numeric($adminId)) {

    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $form_dat=$request->getParsedBody();

    $data=updateMin($this->db,$form_dat,$adminId);
    
    if ($data <=0)
    return $this->response->withJson(array('data' => 'successfully updated'), 200);
});



//-----------------------------------------------STUDENT SIDE-------------------------------------------------------------


//read table student
$app->get('/student', function (Request $request, Response $response, array $arg)
{
    return $this->response->withJson(array('data' => 'success'), 200);
});

// read all data from table student
$app->get('/allstudent',function (Request $request, Response $response, array $arg)
{
    $data = getAllStudent($this->db);
    if (is_null($data)) 
    {
        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
    }

    return $this->response->withJson(array('data' => $data), 200);
});
//request table student by condition (student id)
$app->get('/student/[{id}]', function ($request, $response, $args){
    $studentId = $args['id'];
    if (!is_numeric($studentId)) {
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
}

//GET Method
$data = getStudent($this->db,$studentId);
if (empty($data)) {
return $this->response->withJson(array('error' => 'no data'), 500);
}
return $this->response->withJson(array('data' => $data), 200);
});

//POST Method
$app->post('/student/add', function ($request, $response, $args)
 {
    $form_data = $request->getParsedBody();
    $data = createStudent($this->db, $form_data);
    if (is_null($data)) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
    );

//DELETE Method
//delete row
$app->delete('/student/del/[{id}]', function ($request, $response, $args){
    $studentId = $args['id'];
    if (!is_numeric($studentId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $data = deleteStudent($this->db,$studentId);
    if (empty($data)) {
    return $this->response->withJson(array($studentId=> 'is successfully deleted'), 202);};
    });
    
    //put table student
    $app->put('/student/put/[{id}]', function ($request, $response, $args){
    $studentId = $args['id'];
    if (!is_numeric($studentId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $form_dat=$request->getParsedBody();
    $data=updateStudent($this->db,$form_dat,$studentId);
    if ($data <=0)
    return $this->response->withJson(array('data' => 'successfully updated'), 200);
});



//-----------------------------------------------BOOKING SIDE-------------------------------------------------------------

//read table booking
$app->get('/booking', function (Request $request, Response $response, array $arg)
{
    return $this->response->withJson(array('data' => 'success'), 200);
});

// read all data from table booking
$app->get('/allbooking',function (Request $request, Response $response, array $arg)
{
    $data = getAllBooking($this->db);
    if (is_null($data)) 
    {
        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
    }

    return $this->response->withJson(array('data' => $data), 200);
});
//request table booking by condition (booking id)
$app->get('/booking/[{id}]', function ($request, $response, $args){
    $bookingId = $args['id'];
    if (!is_numeric($bookingId)) {
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
}

//GET Method
$data = getBooking($this->db,$bookingId);
if (empty($data)) {
return $this->response->withJson(array('error' => 'no data'), 500);
}
return $this->response->withJson(array('data' => $data), 200);
});

//POST Method
$app->post('/booking/add', function ($request, $response, $args)
 {
    $form_data = $request->getParsedBody();
    $data = createBooking($this->db, $form_data);
    if (is_null($data)) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
    );

//DELETE Method
//delete row
$app->delete('/booking/del/[{id}]', function ($request, $response, $args){
    $bookingId = $args['id'];
    if (!is_numeric($bookingId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $data = deleteBooking($this->db,$bookingId);
    if (empty($data)) {
    return $this->response->withJson(array($bookingId=> 'is successfully deleted'), 202);};
    });
    
    //put table booking
    $app->put('/booking/put/[{id}]', function ($request, $response, $args){
    $bookingId = $args['id'];
    $date = date('Y-m-d');
    $time = time('h:i:s');
    if (!is_numeric($bookingId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $form_dat=$request->getParsedBody();
    $data=updateBooking($this->db,$form_dat,$bookingId,$date,$time);
    if ($data <=0)
    return $this->response->withJson(array('data' => 'successfully updated'), 200);
});