@extends('layouts.app')

@section('content')


{{--AddStudentModal--}}
<div class="modal fade" id="AddStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Add Student 3</h5>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <ul id='errorformlist'></ul>
        <div class="form-group mb-3">

                <lable for="">Student Names</lable>
                <input type="text" class=" name form-control">

        </div>
        <div class="form-group mb-3">
                <lable for="">Student Email</lable>
                <input type="text"  class=" email form-control">
        </div>

        <div class="form-group mb-3">
                <lable for="">Student phone</lable>
                <input type="text"  class=" phone form-control">
        </div>

        <div class="form-group mb-3">
                <lable for="">Student course</lable>
                <input type="text"  class="course form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_student" >Save</button>
      </div>
    </div>
  </div>
</div>
{{--End AddStudentModal--}}

{{--EditStudentModal--}}
<div class="modal fade" id="EditStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
       
      <ul id='update_error_formlist'></ul>
      <input type="hidden" id=edit_student_id  class="form-group form-control">
        <div class="form-group mb-3">
                <lable for="">Student Names</lable>
                <input type="text" id="edit_name"class=" name form-control">
        </div>
        <div class="form-group mb-3">
                <lable for="">Student Email</lable>
                <input type="text" id="edit_email" class=" email form-control">
        </div>
        <div class="form-group mb-3">
                <lable for="">Student phone</lable>
                <input type="text"  id="edit_phone"class=" phone form-control">
        </div>

        <div class="form-group mb-3">
                <lable for="">Student course</lable>
                <input type="text"  id="edit_course"class="course form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_student" >Update</button>
      </div>
    </div>
  </div>
</div>
{{--End EditStudentModal--}}

{{--DeleteStudentModal--}}
<div class="modal fade" id="DeleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Student </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      <input type="hidden" id=delete_student_id  class="form-group form-control">
      <p>Are you sure you want to delete the data?</p>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary deletestudent" >Delete</button>
      </div>
    </div>
  </div>
</div>
{{--End DeleteStudentModal--}}
       <div class="container py-5">
       
            <div class="row">
                  <div class="col-md-12">
                  <div id="success_message"></div>
                            <div class="card">
                                <div class="card-header">

                                    <h4>Students Data
                                    
                                    <button type="button" class="btn float-right btn-primary" data-toggle="modal" data-target="#AddStudentModal">
                                      Add Student
                                   </button>
                                    
                                    </h4>

                                </div>
                                  <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                              <thead>
                                                      <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Course</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                      </tr>
                                              </thead>
                                              <tbody>
                                                     
                                              </tbody>
                                        </table>
                                  </div>
                            </div>
                  
                  </div>
            
            
            </div>
       
       </div>
@endsection


@section('scripts')

<script>
$(document).ready(function(){
              
              fetchStudents();
              function fetchStudents() {

                  $.ajax({
                    type:"GET",
                    url:"/student-fetch",
                    dataType:'json',
                    success:function(response){
                        //console.log(response.students);
                        $('tbody').html('');
                        $.each(response.students, function(key,student){
                          $('tbody').append( '<tr>\
                                                <td>'+student.id+'</td>\
                                                <td>'+student.name+'</td>\
                                                <td>'+student.email+'</td>\
                                                <td>'+student.phone+'</td>\
                                                <td>'+student.course+'</td>\
                                                <td><button type="submit" value="'+student.id+'"class="edit_student btn btn-primary btn-sm">Edit</button></td>\
                                                <td><button type="submit" value="'+student.id+'"class="delete_student btn btn-danger btn-sm">Delete</button></td>\
                                              </tr>');


                               });

               

                    }
                  });

                  
                  
              }
             //add start
                $(document).on('click','.add_student',function(e){
                        e.preventDefault(); // preventing to load the page and submiting  the modal
                    var data={
                        'name':$('.name').val(),
                        'email':$('.email').val(),
                        'phone':$('.phone').val(),
                        'course':$('.course').val(),  
                            
                    }
                    //console.log(data); 
                    $.ajaxSetup({
                 headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                        });



                      $.ajax({
                        type:'POST',
                        url:'/students',
                        data:data,
                       // contentType: "application/json",
                        dataType: "json",
                        success:function(response){
                            //console.log(response);
                            if(response.status==400){
                              $('#errorformlist').html('');
                              $('#errorformlist').addClass('alert alert-danger');
                                $.each(response.errors, function(key,error_value){
                                  $('#errorformlist').append('<li>'+error_value+'<li/>');
                                });
                            }else{
                              $('#errorformlist').html('');
                              $('#success_message').addClass('alert alert-success');
                              $('#success_message').text(response.message);
                              $('#AddStudentModal').modal('hide');
                              $('#AddStudentModal').find('input').val(''); //empty the input value
                              fetchStudents();
                            }

                        },
                      
                     });
                   
                });
              //add end
            //edit start
                $(document).on('click','.edit_student',function(e) {//$(selector).on(event,childSelector,data,function,map)
                    e.preventDefault();
                    var stu_id=$(this).val();
                      $('#EditStudentModal').modal('show') 
                      
                      $.ajax({
                          type:"GET",
                          url:"/edit-student/"+stu_id,
                          success:function(response){
                            //console.log(response);
                            if(response.status==404){
                              $('#success_message').html('');
                              $('#success_message').addClass('alert alert-danger');
                              $('#success_message').text(response.message);
                            }else{
                                  $('#edit_name').val(response.student.name); 
                                  $('#edit_email').val(response.student.email); 
                                  $('#edit_phone').val(response.student.phone); 
                                  $('#edit_course').val(response.student.course); 
                                  $('#edit_student_id').val(stu_id); 

                            }
                          }
                      });

                  });
                  //update start
                  $(document).on('click','.update_student', function(e){

                      e.preventDefault();
                      //var stu_id=$(this).val();
                      var student_id=$('#edit_student_id').val();
                     // console.log(student_id);
                      var data={
                        'name':$('#edit_name').val(),
                        'email':$('#edit_email').val(),
                        'phone':$('#edit_phone').val(),
                        'course':$('#edit_course').val(),       
                    }

                    $.ajaxSetup({
                      headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                        });

                        $.ajax({
                          type:"PUT",
                          url:"/update-student/"+student_id,
                          data:data,
                        // contentType: "application/json" with the content type is not sendinf the data to the controller, 
                         dataType: "json",
                          success:function(response){
                            //console.log(response);

                            if(response.status==400){
                                //printing errors
                               $('#update_error_formlist').html('');
                              $('#update_error_formlist').addClass('alert alert-danger');
                              $.each(response.errors, function(key,error_value){
                                  $('#update_error_formlist').append('<li>'+error_value+'<li/>');
                                });

                            }else if(response.status==404){

                              $('#update_error_formlist').html('');
                              $('#success_message').addClass('alert alert-danger');
                              $('#success_message').text(response.message);

                            }else{


                              $('#update_error_formlist').html('');
                              $('#success_message').html('');
                              $('#success_message').addClass('alert alert-success');
                              $('#success_message').text(response.message);
                              $('#EditStudentModal').modal('hide');
                              fetchStudents();

                            }
                            
                          }
                      });



                  });//update end & edit


                  $(document).on('click','.delete_student', function(e){
                            e.preventDefault();
                            var stud_id=$(this).val()
                            $('#DeleteStudentModal').modal('show');
                            $('#delete_student_id').val(stud_id);
                          //showing the form if we are sure that we want to delete the data
                    });
                    $(document).on('click','.deletestudent', function(e){
                            e.preventDefault();
                          let stud_id=$('#delete_student_id').val()
                            $.ajaxSetup({
                              headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                        });

                          $.ajax({
                            type:"DELETE",
                            url:"/delete-student/"+stud_id,
                            success:function(response){ 
                              //console.log(response);
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#DeleteStudentModal').modal('hide');
                                fetchStudents();
                          },
                          //showing the form if we are sure that we want to delete the data
                    });
                    //trigger the delete ajax request once we have the id that we want to delete on the model


       });
});

            
        </script>

@endsection