@extends('layouts.app')

@section('content')


{{--AddStudentModal--}}
<div class="modal fade" id="AddStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
                <lable for="">Student Names</lable>
                <input type="text" class=" name form-control">
        </div>
        <div class="form-group mb-3">
                <lable for="">Student Email</lable>
                <input type="text" class=" email form-control">
        </div>

        <div class="form-group mb-3">
                <lable for="">Student phone</lable>
                <input type="text" class=" phone form-control">
        </div>

        <div class="form-group mb-3">
                <lable for="">Student course</lable>
                <input type="text" class=" course form-control">
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
                            <div class="card">
                                <div class="card-header">

                                    <h4>Students Data
                                    
                                    <button type="button" class="btn float-right btn-primary" data-toggle="modal" data-target="#AddStudentModal">
                                      Add Student
                                   </button>
                                    
                                    </h4>

                                </div>
                            
                            </div>
                  
                  </div>
            
            
            </div>
       
       </div>
@endsection


@section('scripts')

        <script>
            $(document).ready(function(){

                $(document).on('click','.add_student',function(e){
                        e.preventDefault();

                    var data={
                        'name':$('.name').val();
                        'email':$('.email').val();
                        'phone':$('.phone').val();
                        'course':$('.course').val();
                        
                    }
                    
                });

            });

            
        </script>

@endsection