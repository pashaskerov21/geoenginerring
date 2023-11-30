@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-7">
            <h4 class="page-title my-3">Şəxsi Məlumat</h4>
            <div class="card card-2">
                <div class="card-body">
                    <table class="table table-2">
                        <tr>
                            <td>Şəkil</td>
                            <td>
                                @if ($application->image)
                                    <img style="width: 250px; height: 150px; object-fit: contain" src="{{ asset('storage/uploads/applications/images/' . $application->image) }}" alt="">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Ad Soyad Ata Adı</td>
                            <td>{{ $application->first_name }} {{ $application->last_name }} {{ $application->father_name }}
                            </td>
                        </tr>
                        <tr>
                            <td>Cinsi</td>
                            <td>{{ $application->gender == 'male' ? 'Kişi' : 'Qadın' }}</td>
                        </tr>
                        <tr>
                            <td>Doğum tarixi</td>
                            <td>{{ $application->birth }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $application->email }}</td>
                        </tr>
                        <tr>
                            <td>Nömrə</td>
                            <td>{{ $application->phone }}</td>
                        </tr>
                        <tr>
                            <td>CV</td>
                            <td><a href="{{ asset('storage/uploads/applications/cv/' . $application->cv) }}" target="_blank">Keçid
                                    edin</a></td>
                        </tr>
                        <tr>
                            <td>Linkedin</td>
                            <td>
                                <a target="_blank"
                                    href="{{ $application->linkedin_url }}">{{ $application->linkedin_url }}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Ünvan</td>
                            <td>{{ $application->address }}</td>
                        </tr>
                        <tr>
                            <td>Müraciət etdiyi vəzifə</td>
                            <td>
                                @if ($vacancy)
                                    {{ $vacancy->getTranslate->first()->title }}
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <h4 class="page-title my-3">Təhsil</h4>
            <div class="card card-2">
                <div class="card-body">
                    @if (count($application->getEducation) > 0)
                        <table class="table table-2">
                            <tr>
                                <th>Təhsil səviyyəsi</th>
                                <th>Müəssisənin adı</th>
                                <th>Şöbə</th>
                                <th>Başlama tarixi</th>
                                <th>Bitmə tarixi</th>
                            </tr>
                            @foreach ($application->getEducation as $education)
                                <tr>
                                    <td>{{ $education->education_level }}</td>
                                    <td>{{ $education->education_name }}</td>
                                    <td>{{ $education->education_field }}</td>
                                    <td>{{ $education->education_start_date }}</td>
                                    <td>{{ $education->education_end_date }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div style="text-align: center">boş</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <h4 class="page-title my-3">İş</h4>
            <div class="card card-2">
                <div class="card-body">
                    @if (count($application->getWork) > 0)
                        <table class="table table-2">
                            <tr>
                                <th>Şirkət adı</th>
                                <th>Vəzifə</th>
                                <th>Başlama tarixi</th>
                                <th>Bitmə tarixi</th>
                            </tr>
                            @foreach ($application->getWork as $work)
                                <tr>
                                    <td>{{ $work->company_name }}</td>
                                    <td>{{ $work->position }}</td>
                                    <td>{{ $work->work_start_date }}</td>
                                    <td>{{ $work->work_end_date }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div style="text-align: center">boş</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <h4 class="page-title my-3">Sertifikat</h4>
            <div class="card card-2">
                <div class="card-body">
                    @if (count($application->getCertificate) > 0)
                        <table class="table table-2">
                            <tr>
                                <th>Sertifikat adı</th>
                                <th>Son istifadə tarixi</th>
                            </tr>
                            @foreach ($application->getCertificate as $certificate)
                                <tr>
                                    <td>{{ $certificate->certificate_name }}</td>
                                    <td>{{ $certificate->certificate_date }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div style="text-align: center">boş</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <h4 class="page-title my-3">Xarici Dil</h4>
            <div class="card card-2">
                <div class="card-body">
                    @if (count($application->getLanguage) > 0)
                        <table class="table table-2">
                            <tr>
                                <th>Dil</th>
                                <th>Səviyyə</th>
                            </tr>
                            @foreach ($application->getLanguage as $language)
                                <tr>
                                    <td>{{ $language->language_name }}</td>
                                    <td>{{ $language->language_level }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div style="text-align: center">boş</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
