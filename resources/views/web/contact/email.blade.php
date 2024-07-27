<div style="width: 700px;margin: 0 auto;padding: 15px;font-size: 16px;">
    <p style="margin:0 0 10px 0"><span style="font-weight: bold">{{__('contact.name')}}: </span> {{$contact->name}}</p>
    <p style="margin:0 0 10px 0"><span style="font-weight: bold">{{__('contact.phone')}}: </span> {{$contact->phone}}</p>
    <p style="margin:0 0 10px 0"><span style="font-weight: bold">{{__('contact.email')}}}: </span> {{$contact->email}}</p>
    <p style="margin:0 0 10px 0;font-weight: bold">{{__('contact.content')}}: </p>
    <div>{!! $contact->content !!}</div>
</div>
