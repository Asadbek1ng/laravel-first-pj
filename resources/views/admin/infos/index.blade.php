@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Infos</h3>
                <a class="create__btn" href="{{ route('admin.infos.create') }}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        
                        <th>Image</th>
                        <th>Data</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($infos as $item)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $item->title }}</td>

                            <td><img src="/files/{{ $item->icon }}" width="60px"></td>
                            <td>{{ $item->created_at }}</td>
                            <td>

                                <form method="POST" action="{{ route('admin.infos.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-primary" href="{{ route('admin.infos.show', $item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a class="btn btn-primary" href="{{ route('admin.infos.edit', $item->id) }}"><ion-icon name="create-outline"></ion-icon></a>

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')"><ion-icon name="trash-outline"></ion-icon></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{$infos->links()}}
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
