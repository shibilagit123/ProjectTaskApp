    @extends('layouts.master')
              @section('custom_css')
           
              @endsection
              @section('content')
              
              <div class="content-wrapper">
                   <div class="content-heading">
                    <span><em class="fa fa-group"></em> {{ $title_name }}</span> 
                   </div><div class="row" style="float: right;">
                    
                     
                   </div>
                <div class="container-fluid">
                   
                  <div class="panel panel-default">
                    


                <div class="panel-body">

                  <form class="form-horizontal" action="{{ route('time.store') }}" id="form" method="post" >
                    @csrf
                    <div class="">
                        <div class=""> 
                      <div class="col-sm-4">
                       <label class="control-label">
                         Project name
                       </label>
                       <select name="project_id" class="form-control select2" >
                         <option value=""></option>
                         @foreach($projects as $pt)
                         <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                         @endforeach
                       </select>
                     </div>
                     <div class="col-sm-4">
                      <label class="control-label">Task</label>
                      <select class="form-control select2" name="task_id" >
                        @foreach($tasks as $tsk)
                        <option value="{{$tsk->id }}" >{{ $tsk->name }}</option>
                      @endforeach
                    </select>
                  </div>
                     
                          <div class="col-sm-4">
                            <label class="control-label">Date</label>
                            <div class="input-group date" id="datetimepicker3"><input type="text" name="date" class="form-control" placeholder="Date" onchange="read" value=""  ><span class="input-group-addon"><span class="fa fa-calendar"></span></span></div></div>

                          <div class="col-sm-3"><label class="control-label">Time</label><input type="number" step="any" name="hours"  class="form-control price" placeholder="Time"   value="" ></div>
                   </div>
                   <div class="col-sm-6">
                             <label class="control-label">
                              Description
                            </label>
                            <textarea name="description" class="form-control"></textarea>
                          </div>
                    
                   
          

    </div> 
     
             
    <br>
    <div>
      
    </div>


    <div class="form-group">
     <div class="col-sm-12">
      <div class="pull-right">
       <button class="btn btn-sm btn-info" type="submit">Submit</button>
     </div>  
    </div>
    </div>

    </form>

   <div class="table-responsive">
                                <table id="datatable2" class="table table-striped table-hover">
                                   <thead>
                                      <tr>
                                         <th>Sl.No</th>
                                         <th>Project Name</th>
                                         <th>Task Name</th>
                                         <th>Hours</th>
                                         <th>Date</th>
                                         <th>Description</th>
                                         <th>Status</th>
                                      
                                      </tr>
                                   </thead>
                                   <tbody>
                                    @foreach($time as $key=>$row)
                                      <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$row->project->name}}</td>
                                        <td>{{$row->task->name}}</td>
                                        <td>{{$row->hours}}</td>
                                        <td>{{date('d/m/Y',strtotime(str_replace('-','/',$row->date)))}}</td>
                                        <td>{{$row->description}}</td>
                                       
                                       <td><button class="btn btn-xs {{ $row->status=='1' ? 'btn-success' : 'btn-warning' }}" rel1="{{ $row->status}}"  rel2="{{ $row->id }}"  >{{ $row->status=='2'   ? ' In Active' : 'Active'}}</button></td>
                                      </tr>
                                      @endforeach
                                     
                                   </tbody>
                                </table>
                             </div>

          <!-- <div id="calendar"></div>
          -->
        </div>
      
        </div>
              
        </div>
        </div>

        @endsection

        @section('custom_js')

        <script>
          $('#datetimepicker3').datetimepicker({
          defaultDate: new Date(),
          format: 'DD/MM/YYYY',

        });
       

  $('#form').submit(function(event) {

    /* Act on the event */
    event.preventDefault();
    var form = document.getElementById('form');
    var fdata = new FormData(form);
    var url = '';
    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      dataType: 'json',
      data: fdata,
      processData: false,
      contentType: false
    })
    .done(function(data) {
      if(data.status=="error")
      {
        swal('Warning',data.msg, 'warning');
      }
      else
      {
        swal({
          title: "Success!",
          text: data.msg,
          type: "success"
        }, function() {
          // var slug = data.ax;
          window.location.href = '{{ route('time.create') }}';
        });
      }
    });
    
  });


        </script>
        @endsection
