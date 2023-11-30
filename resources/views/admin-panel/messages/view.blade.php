@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Mesaj</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <table class="table table-2">
                        <tr>
                            <td>Ad</td>
                            <td>{{$message->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$message->email}}</td>
                        </tr>
                        <tr>
                            <td>Nömrə</td>
                            <td>{{$message->phone}}</td>
                        </tr>
                        <tr>
                            <td>Başlıq</td>
                            <td>{{$message->subject}}</td>
                        </tr>
                        <tr>
                            <td>Mesaj</td>
                            <td>{{$message->text}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-lg-6">
            <form action="{{route('admin.messages.send')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">email</label>
                    <input type="text" class="form-control" name="email" value="{{$message->email ?? ''}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">text</label>
                    <textarea class="form-control" name="text" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div> --}}
    </div>

@endsection