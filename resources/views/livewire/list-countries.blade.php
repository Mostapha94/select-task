<div id="countries">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Details</th>
          </tr>
        </thead>
        <tbody>
            @foreach($countries as $i=>$country)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $country['sISOCode'] }}</td>
                <td>{{ $country['sName'] }}</td>
                <td><a class="btn btn-primary" href="{{ route('country.show',['countryCode'=>$country['sISOCode']]) }}">Show Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
