@extends('layout/admin/app')
@section('title','Add Category')
 @section('content')
    <div class="topbar-left">
         <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Add Category</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        
                       
                        <div class="row">
                     <div class="col-sm-12">
                            <div class="card-box text-left">
                                <div class="form-group text-right">
                                    <a type="submit" id="demo-btn-addrow" class="btn btn-primary m-b-20" href="{{url('admin/category')}}" ><i class="fa fa-angle-left"></i> Back</a>
                            </div>
                                    <div class="row">
                                        <form action="{{url('admin/category')}}" method="post" name="addCategory">
                                        <style type="text/css">.error{color: red!important;}</style>

                                            @csrf   
                                             <div class="form-group row">
                                                <label for="category" class="col-md-6 col-form-label text-md-right">{{ __('Category Name:') }}</label>
                        
                                                <div class="col-md-6">
                                                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="name" value="{{ old('category') }}" >
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4 text-md-right" >
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Add Category') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div> <!-- end Panel -->
                </div> <!-- container -->
            </div> <!-- content -->
        </div>
@endsection

@section('scripts')
<script>       
$(function(){
    $("form[name='addCategory']").validate({

        rules:{
            name:{
                required:true,
            
            remote:{
                url:"{{url("admin/category/uniqueCategory")}}",
                type:"GET",
                data:{
                    colorName:function(){
                        return $("#name").val();
                    }
                },
            }
            }
        },
        messages:{
            name:{
                required:"Please Enter Category Name",
                remote:"Category Is Already taken"
            }
        },
        submitHandler:function(form){
            form.submit();
        }

    });
});
</script>
@endsection