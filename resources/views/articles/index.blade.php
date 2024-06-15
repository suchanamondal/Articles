@extends('layouts.app')

@section('title', 'Articles')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<style>
    /* Ensure all images have the same size */
    .description img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>
@endsection

@section('content')
<div class="container mt-5">
    <h2>Articles</h2>
    <table id="articles-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            @forelse($articles as $article)
            <tr>
                <td>{{ $article['title'] }}</td>
                <td class="description">{!! $article['description'] !!}</td>
                <td><a href="{{ $article['link'] }}" target="_blank">Read more</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No data available in table</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#articles-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "language": {
                "paginate": {
                    "previous": "<i class='fas fa-angle-left'></i>",
                    "next": "<i class='fas fa-angle-right'></i>"
                }
            }
        });
    });
</script>
@endsection
