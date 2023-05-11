<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TodoModel;

use CodeIgniter\API\ResponseTrait;
// use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Controller;
use Exception;

class TodoController extends Controller
{
    use ResponseTrait;

    public function getUser()
    {
      
        $UserModel = new UserModel();
        try {

          $data = $UserModel->first();         
            if ($UserModel->db->error()['code']) {
                throw new Exception($UserModel->db->error()['message'], 500);
            }

            if ($data) {
                $response = [
                    'status' => 200,
                    'error' => null,
                    'data' => $data,

                ];
            } else {
                $response = [
                    'status' => 500,
                    'error' => 'Something went wrong! Please try again later.',
                ];
            }
            return $this->respond($response, 200);
        } catch (\Exception $e) {

        $response = [
            'status' => $e->getCode() === 0 ? 500 : $e->getCode(),
            'error' => $e->getCode() === 409 ? $UserModel->errors() : $e->getMessage(),
        ];
            return $this->respond($response, 200);
        }
       
    }

    public function getTodo()
    {
      
        $TodoModel = new TodoModel();
        try {

          $data = $TodoModel->findAll();         
            if ($TodoModel->db->error()['code']) {
                throw new Exception($TodoModel->db->error()['message'], 500);
            }

            if ($data) {
                $response = [
                    'status' => 200,
                    'error' => null,
                    'data' => $data,

                ];
            } else {
                $response = [
                    'status' => 500,
                    'error' => 'Something went wrong! Please try again later.',
                ];
            }
            return $this->respond($response, 200);
        } catch (\Exception $e) {

        $response = [
            'status' => $e->getCode() === 0 ? 500 : $e->getCode(),
            'error' => $e->getCode() === 409 ? $TodoModel->errors() : $e->getMessage(),
        ];
            return $this->respond($response, 200);
        }
       
    }
    public function todoCreate()
    {
        $TodoModel = new TodoModel();
        try {

         $data=[
            'todo_name' => $this->request->getVar('name'),
            'status'=>1
         ];
         $rs = $TodoModel->insert($data);        
            if ($TodoModel->db->error()['code']) {
                throw new Exception($TodoModel->db->error()['message'], 500);
            }

            if ($rs) {
                $response = [
                    'status' => 200,
                    'error' => null,
                    'data' => $data,

                ];
            } else {
                $response = [
                    'status' => 500,
                    'error' => 'Something went wrong! Please try again later.',
                ];
            }
            return $this->respond($response, 200);
        } catch (\Exception $e) {

        $response = [
            'status' => $e->getCode() === 0 ? 500 : $e->getCode(),
            'error' => $e->getCode() === 409 ? $TodoModel->errors() : $e->getMessage(),
        ];
            return $this->respond($response, 200);
        }
    }
    public function updateStatus()
    {
       $id = $this->request->getVar('id');
       $status= $this->request->getVar('status');
       $TodoModel = new TodoModel();
       try {
        $rs = $TodoModel->set('status',$status)->where('id', $id)->update();        
           if ($TodoModel->db->error()['code']) {
               throw new Exception($TodoModel->db->error()['message'], 500);
           }

           if ($rs) {
               $response = [
                   'status' => 200,
                   'error' => null,
                   'messge' => "updated",

               ];
           } else {
               $response = [
                   'status' => 500,
                   'error' => 'Something went wrong! Please try again later.',
               ];
           }
           return $this->respond($response, 200);
       } catch (\Exception $e) {

       $response = [
           'status' => $e->getCode() === 0 ? 500 : $e->getCode(),
           'error' => $e->getCode() === 409 ? $TodoModel->errors() : $e->getMessage(),
       ];
           return $this->respond($response, 200);
       }

    }
    public function updateTodo()
    {
     $name = $this->request->getVar('name');
     $id= $this->request->getVar('id');
     $TodoModel = new TodoModel();
     try {
        $rs = $TodoModel->set('todo_name',$name)->where('id', $id)->update();        
           if ($TodoModel->db->error()['code']) {
               throw new Exception($TodoModel->db->error()['message'], 500);
           }

           if ($rs) {
               $response = [
                   'status' => 200,
                   'error' => null,
                   'messge' => "updated",

               ];
           } else {
               $response = [
                   'status' => 500,
                   'error' => 'Something went wrong! Please try again later.',
               ];
           }
           return $this->respond($response, 200);
       } catch (\Exception $e) {

       $response = [
           'status' => $e->getCode() === 0 ? 500 : $e->getCode(),
           'error' => $e->getCode() === 409 ? $TodoModel->errors() : $e->getMessage(),
       ];
           return $this->respond($response, 200);
       }
     
    }
    public function deleteTodo(Type $var = null)
    {
        $id = $this->request->getVar('id');
        
        $TodoModel = new TodoModel();
        try {
           $rs = $TodoModel->where('id', $id)->delete();        
              if ($TodoModel->db->error()['code']) {
                  throw new Exception($TodoModel->db->error()['message'], 500);
              }
   
              if ($rs) {
                  $response = [
                      'status' => 200,
                      'error' => null,
                      'messge' => "deleted",
   
                  ];
              } else {
                  $response = [
                      'status' => 500,
                      'error' => 'Something went wrong! Please try again later.',
                  ];
              }
              return $this->respond($response, 200);
          } catch (\Exception $e) {
   
          $response = [
              'status' => $e->getCode() === 0 ? 500 : $e->getCode(),
              'error' => $e->getCode() === 409 ? $TodoModel->errors() : $e->getMessage(),
          ];
              return $this->respond($response, 200);
          }
    }

}
