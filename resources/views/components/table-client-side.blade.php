<table {{ $attributes->merge(['class' => 'table table-bordered']) }} id="dataTable">
    <thead>
        {{ $thead ?? '' }}
    </thead>
    <tbody>
        {{ $tbody }}
    </tbody>
    <tfoot>
        {{ $tfoot ?? '' }}
    </tfoot>
</table>
