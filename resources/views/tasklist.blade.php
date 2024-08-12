@extends('layouts.master')
          @section('custom_css')
       
          @endsection
          @section('content')
          
          <div class="content-wrapper">
               <div class="content-heading">
                <span><em class="fa fa-group"></em> {{ $title_name }}</span> 
               </div>
            <div class="container-fluid">
              
              <div class="panel panel-default">
                <div class="panel-body"></div>

            <div class="panel-body">


                <div class="table-responsive">
                              <table id="datatable2" class="table table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>Sl.No</th>
                                       <th>Name</th>
                                       <th>Status</th>
                                    
                                    </tr>
                                 </thead>
                                 <tbody>
                                  @foreach($task as $key=>$row)
                                    <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$row->name}}</td>
                                     
                                     <td><button class="btn btn-xs {{ $row->status=='1' ? 'btn-success' : 'btn-warning' }}" rel1="{{ $row->status}}"  rel2="{{ $row->id }}"  >{{ $row->status=='1'   ? 'Active' : 'In Active'}}</button></td>
                                    </tr>
                                    @endforeach
                                   
                                 </tbody>
                              </table>
                           </div>


               
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
   




    </script>
    @endsection
