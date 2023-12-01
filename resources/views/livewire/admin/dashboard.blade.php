<div class="row">

    <div class="col-lg-3 col-6">
        <x-admin-stat-card title="Comandas" quantity="{{$todayCommands}}" icon="fas fa-clipboard-list" link="{{route('admin.commands.index')}}" />
    </div>
    <div class="col-lg-3 col-6">
        <x-admin-stat-card title="Productos" quantity="{{$todayCommands}}" icon="fas fa-clipboard-list" link="{{route('admin.commands.index')}}" />
    </div>

</div>
