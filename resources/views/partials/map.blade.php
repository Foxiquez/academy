<body style="height: 100%; margin: 0;">
    <div id="map-canvas" style="height: 100%; margin: 0;"></div>
</body>
<script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAqpzO-0Zvh3sUA18bNTUGXWGdb-6mxg9Q"></script>
<script src="{{ asset('js/map/core.min.js') }}"></script>
<script src="{{ asset('js/map/protection.js') }}"></script>
<script>

    var satType = new SanMapType(0, 3, function (zoom, x, y) {
        return x == -1 && y == -1
            ? "{{ asset('js/map/tiles') }}/sat.outer.png"
            : "{{ asset('js/map/tiles') }}/sat." + zoom + "." + x + "." + y + ".png";//Where the tiles are located
    });


    var mapType = new SanMapType(0, 4, function (zoom, x, y) {
        return x == -1 && y == -1
            ? "{{ asset('js/map/tiles') }}/sanandreas.blank.png"
            : "{{ asset('js/map/tiles') }}/sanandreas." + zoom + "." + x + "." + y + ".png";//Where the tiles are located
    });

    var map = SanMap.createMap(document.getElementById('map-canvas'),
        {'{{ trans('general.map.satelite') }}': satType, '{{ trans('general.map.road') }}': mapType}, 2, null, false, '{{ trans('general.map.satelite') }}');


    let points = Array();
    @foreach($mapPoints as $point)
        points[{{ $point->id }}] = ['window', 'marker', 'event'];
        points[{{ $point->id }}]['window'] = new google.maps.InfoWindow({
        content: '<b>{{ $point->name }}</b> - {{ $point->date }}<hr>{{ $point->desc }}'
        });
        points[{{ $point->id }}]['marker'] = new google.maps.Marker({
            position: SanMap.getLatLngFromPos({{ $point->x }}, {{ $point->y }}),
            map: map
        });
        points[{{ $point->id }}]['event'] = google.maps.event.addListener(points[{{ $point->id }}]['marker'], 'click', function () {
            points[{{ $point->id }}]['window'].open(map, points[{{ $point->id }}]['marker']);
        });
            @endforeach
</script>