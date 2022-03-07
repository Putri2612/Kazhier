@php
    $ref = asset(Storage::url('reference/'));
    $mimeType = explode(".", $payment->reference);
    $mime = $mimeType[count($mimeType) - 1];
@endphp
<div class="row">
    
    <embed class="{{($mime != "pdf"? 'img-fluid':'')}} mx-auto" src="{{$ref.'/'.$payment->reference}}" {{($mime == "pdf" ? 'width=100% height=300px': '')}}>
</div>