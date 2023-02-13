@extends('Template.Main')

@section('content')
    <div class="bg-white rounded-lg">
        <div class="p-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-700 hover:text-gray-600">
                    Daftar Pengaduan</h2>
            </div>
            <div class="divider"></div>
            <a role="button" class="btn btn-success text-white mb-2" href="{{ route('feedback.export') }}" >Export<i class="fa-solid fa-file-export pl-2"></i></a>
            <div class="overflow-x-auto">
                <table class="table w-full border-red-300">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Fungsi</th>
                            <th>Pembuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>
                                    <div class="break-normal whitespace-normal">
                                        {{ $feedback->kritik }}</td>
                                    </div>
                                <td>
                                    <div class="break-normal whitespace-normal">
                                        {{ $feedback->saran }}
                                    </div>
                                </td>
                                <td>
                                    <div class="rating  items-center">
                                        <input disabled type="radio" {{ $feedback->rating == 1 ? 'checked' : '' }}
                                            name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                        <input disabled type="radio" {{ $feedback->rating == 2 ? 'checked' : '' }}
                                            name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                        <input disabled type="radio" {{ $feedback->rating == 3 ? 'checked' : '' }}
                                            name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                        <input disabled type="radio" {{ $feedback->rating == 4 ? 'checked' : '' }}
                                            name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                        <input disabled type="radio" {{ $feedback->rating == 5 ? 'checked' : '' }}
                                            name="rating-{{ $feedback->id }}" class="mask mask-star" />
                                    </div>

                                </td>
                                {{-- <td>{{ $mitigasi->kegiatan }}</td> --}}
                                {{-- <td>
                                    <div class="flex gap-2">
                                        <a href="{{ route('pengaduan.view', ['id' => $mitigasi->id]) }}" target="_blank"
                                            rel="noopener noreferrer" role="button" class="btn btn-primary text-white"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('mitigasi.edit', ['id' => $mitigasi->id]) }}" role="button" class="btn btn-warning text-white"><i class="fa-solid fa-pen-to-square"></i></i></a>
                                        @if ($mitigasi->is_verif)
                                        <a href="" role="button" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-info text-white"><i class="fa-solid fa-print"></i></a>
                                        @endif
                                            <form action="{{ route('mitigasi.destroy', $mitigasi->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error text-white"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $feedbacks->links() }}
            </div>
        </div>
    </div>
@endsection
@push('js')
