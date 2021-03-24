<div style="border: 1px solid #000" class="container">
    <!-- Portfolio Item Heading -->
    <h1 class="my-4"><span class="btn btn-info">Country</span> :
      <small>{{ $country['sName'] }}</small>
    </h1>
    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-8">
            <img width="650" class="img-fluid" src="{{ $country['sCountryFlag'] }}" alt="">
        </div>
        <div class="col-md-4">
            <h3 class="btn btn-info" class="my-3">Code</h3>
            <p>{{ $country['sISOCode'] }}</p>
            <h3 class="my-3 btn btn-info">Other Details</h3>
            <ul>
                <li>City : {{ $country['sCapitalCity'] }}</li>
                <li>Phone Code : {{ $country['sPhoneCode'] }}</li>
                <li>Continent Code : {{ $country['sContinentCode'] }}</li>
                <li>Currency Code : {{ $country['sCurrencyISOCode'] }}</li>
                <li>Phone Code : {{ $country['sPhoneCode'] }}</li>
            </ul>
            @if(!empty($country['Languages']) && !empty($country['Languages']['tLanguage']) && !empty($country['Languages']['tLanguage']['sISOCode']))
            <h3 class="my-3 btn btn-info">Language</h3>
            <ul>
                <li>Code : {{ $country['Languages']['tLanguage']['sISOCode'] }}</li>
                <li>Name : {{ $country['Languages']['tLanguage']['sName'] }}</li>
            </ul>
            @endif
        </div>
    </div>
    <!-- /.row -->
    <hr>
    <h3><a class="btn btn-primary" href="{{ route('country.index') }}">Back to all Countries</a></h3>
</div>
