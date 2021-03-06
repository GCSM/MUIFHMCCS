  <div class="sidebar" id="sidebar">
    <div class="panel panel-default sidebar-panel">
      <div class="panel-heading">
	    <h4 class="panel-title">
	      <b>Notifications</b>
          <div class='pull-right'>
            <a href='#' onClick="filterNotifications(this, 'danger');"><span class="badge danger"><span class="glyphicon glyphicon-exclamation-sign"></span> {{$counts['critical']}}</span></a>
            <a href='#' onClick="filterNotifications(this, 'warning');"><span class="badge warning"><span class="glyphicon glyphicon-info-sign"></span> {{$counts['alert']}}</span></a>
          </div>
	    </h4>
      </div>
      <div class="notifications" id="notifications-list">
        <table class="table table-bordered table-striped table-hover" id="notifications-table">
          @foreach ($notifications as $n)
            @if ($n->class == 'critical')
            <tr>
              <td class='alert-danger' name='danger'>
                <span class='text-danger'>
                  <span class="glyphicon glyphicon-exclamation-sign"></span>
            @elseif ($n->class == 'alert')
            <tr>
              <td class='alert-warning' name='warning'>
                <span class='text-warning'>
                  <span class="glyphicon glyphicon-info-sign"></span>
            @endif
                  <b>{{ $n->type }}</b>
                </span>
                <br>
                <span class="badge">{{ strtoupper($n->status) }}</span>
                <span class="pull-right">
                  <span class="glyphicon glyphicon-comment"></span>
                </span>
                <br>
                <? $f = FumeHood::where('name', $n->fume_hood_name)->firstOrFail(); ?>
                <a href="#" id="notification_link{{$n->id}}">{{ $f->getBuilding()->abbv }}  
                    {{ $f->getRoom()->name }} Fumehood {{ $n->fume_hood_name }}</a>
                
                <script type="text/javascript">
                  $(document).ready(function(){
				    $('{{"#notification_link".$n->id}}').on('click', function(){
					  var url = "{{ URL::to('/hood/').'/'.$f->id }}";
					  $.get(url, '', function(data){
						$('#mainInfo').html(data);
					  });
				    });
				  });
                </script>
                <br>
                Updated At: {{ max($n->updated_time, $n->measurement_time) }}
              </td>
            </tr>
          @endforeach
          @if (!$notifications)
            <tr><td>No current notifications.</td></tr>
          @endif
        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#update_time").text("{{date("Y-m-d H:i:s")}}");
      setTimeout(function(){
        //Dont do it if modal is open
          $('#notifications').load("{{ URL::to('/notifications') }}");
      }, 900000);
    });
    
    function filterNotifications(btn, name){
        $("#notifications-table td[name='"+name+"']").fadeToggle();
        $(btn).children("span").toggleClass(name);
    }
  </script>  	
