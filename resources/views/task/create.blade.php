@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">เพิ่มข้อมูลงานย่อย


                </div>

                <div class="panel-body">
            {!! Form::open(['route'=>'task.postcreate','class'=>'form-horizontal']) !!}
                {!! Form::hidden('activity_id',Input::get('activity_id')) !!}
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Task</label>  
                                <div class="col-md-6">
                                    <input id="name" name="name" type="text"  class="form-control input-md">

                                </div>
                               
                            </div>
<div class="form-group">
                              
                                 <label class="col-md-4 control-label" for="name">คาดการช่วงเวลาที่ทำ</label>  
                                <div class="col-md-6">
                                    <input id="task_range" name="task_range" type="text"  class="form-control daterange input-md">

                                </div>
                            </div>
                    
                           <div class="form-group">
                                <label class="col-md-4 control-label" for="name">item of Task</label>  
                                <div class="col-md-3">
                                    <input id="item_of_task" name="item_of_task" type="text"  class="form-control input-md">

                                </div>
                               
                            </div>
           
                                  <div class="form-group">
                                <label class="col-md-4 control-label" for="name">ผู้รับผิดชอบ</label>  
                                <div class="col-md-3">
                                <?php $user =  App\User::where('project_id',Auth::user()->project_id)->where('role','student')->lists('first_name','id') ?>
                                   {!! Form::select('responsible',$user,'',['class'=>'form-control chosen']) !!}
                                
                                </div>
                               
                            </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="name">ต้องรองานอื่นไหม?</label>  
                                <div class="col-md-3">
                                <?php $user =  App\Task::where('project_id',Auth::user()->project_id)
                                ->lists('name','id') ?>
     {!! Form::select('dependent_on[]',$user,'',['class'=>'form-control chosen','multiple']) !!}
                                
                                </div>
                               
                            </div>
                                 

                                          <div class="form-group">
                                <label class="col-md-4 control-label" for="name"></label>  
                                <div class="col-md-3">
          
                                   {!! Form::submit('บันทึก',['class'=>'btn btn-primary']) !!}
                                
                                </div>
                               
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('specific_script')
<script type="text/javascript">
$("#appoint_group").chosen();
</script>

@stop