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
                                                      <tr><!--table row-->
                                                        <td>1</td>
                                                        <td>Ad</td>
                                                        <td>Ad</td>
                                                        <td>Ad</td>
                                                        <td>Ad</td>
                                                        <td><button type="submit" value=""class="edit_student btn btn-primary btn-sm">Edit</button></td>
                                                        <td><button type="submit" value="" class="delete_student btn btn-danger btn-sm">Delete</button></td> <!--table data <td>-->
                                                      </tr>
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
//$(selector).on(event,childSelector,data,function,map)
                $(document).on('click','.add_student',function(e){
                        e.preventDefault(); // preventing to submit the modal
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
                        //contentType: "application/json",
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
                              
                            }

                        },
                       // error: (error) => {
                    // console.log(JSON.stringify(error));
   });
                     // });
                });

            });

            
        </script>

@endsection