<div class="main">
@include('navbars.main-nav', array('level' => 'buildings'))
  <div class="main-view">
    @if(Session::get('isTileView') == 1)
      <div class="spinner-container" id="spinner" ></div>
    @else
        LIST VIEW
    @endif
  </div>
</div>

<script type = 'text/javascript'>
$(document).ready(function(){
  $("#update_time").text("{{date("Y-m-d H:i:s")}}");
  setTimeout(function(){
    var url = "{{ URL::to('/buildings') }}";
    $.get(url, '', function(data){
        $('#mainInfo').html(data);
    });
  }, 900000);

@if(Session::get('isTileView') == 1)
  $('#spinner').spin('tile');
@else
  $('#spinner').spin('list');
@endif
  streamData("spinner", "{{ URL::to('/buildings/stream/') }}", 0, 0);
});
</script>
