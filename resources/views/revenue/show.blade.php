@php
    $ref = asset(Storage::url('reference/'));
    $mimeType = explode(".", $revenue->reference);
    $mime = $mimeType[count($mimeType) - 1];
@endphp
<div class="row">
    <embed class="{{($mime != "pdf"? 'img-fluid':'')}} mx-auto" src="{{$ref.'/'.$revenue->reference}}" {{($mime == "pdf" ? 'width=100% height=300px': '')}}>
</div>