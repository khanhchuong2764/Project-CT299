@foreach ($menus as $menu)
    @if ($menu->parentID == $parentID)
        <li class="dropdown-item dropdown-submenu dropend">
            <a href="/product/{{$menu->id}}">{{ $menu->title }}</a>

            {{-- Kiểm tra xem có menu con không --}}
            @php
                $hasChild = $menus->where('parentID', $menu->id)->isNotEmpty();
            @endphp

            {{-- Nếu có menu con, thêm một <ul> và gọi đệ quy --}}
            @if ($hasChild)
                <ul class="dropdown-menu" style="width: 220px;">  <!-- Thêm width trực tiếp tại đây -->
                    @include('components.submenu', ['menus' => $menus, 'parentID' => $menu->id]) 
                </ul>
            @endif
        </li>
    @endif
@endforeach