<div style="width: 700px;margin: 0 auto;padding: 15px;font-size: 16px;">
    <p style="margin:0 0 10px 0"><span style="font-weight: bold">Họ và tên: </span> {{$contact->name}}</p>
    <p style="margin:0 0 10px 0"><span style="font-weight: bold">Số điện thoại: </span> {{$contact->phone}}</p>
    <p style="margin:0 0 10px 0"><span style="font-weight: bold">Email: </span> {{$contact->email}}</p>
    <p style="margin:0 0 10px 0;font-weight: bold">Nội dung: </p>
    <div>{!! $contact->content !!}</div>
</div>
