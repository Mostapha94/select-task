<div class="containers">
      @if (session()->has('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
    <table class="table">
      <tr>
        <td colspan="3"></td>
        <td scope="col">
          <form action="{{ route('api.country.store') }}" method="post" >
          <button type="submit" class="btn btn-success">Sync Data</button>
        </form>
         </td>
      </tr>

      <tr class="thead-dark">
        <th scope="col">#</th>
        <th scope="col">Code</th>
        <th scope="col">Name</th>
        <th scope="col">Details</th>
      </tr>

      @foreach($countries as $i=>$country)
      <tr>
          <th scope="row">{{ $i }}</th>
          <td>{{ $country['sISOCode'] }}</td>
          <td>{{ $country['sName'] }}</td>
          <td><a class="btn btn-primary" href="{{ route('country.show',['countryCode'=>$country['sISOCode']]) }}">Show Details</a></td>
      </tr>
      @endforeach
    </table>
</div>
