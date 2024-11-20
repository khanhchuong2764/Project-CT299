@foreach ($menus as $menu)
    @if ($menu->parentID == $parentID)
        <li class="nav-item border-bottom w-100">
            <!-- Link tới trang sản phẩm -->
            <a href="/product/{{$menu->id}}" class="nav-link">
                {{ $menu->title }} <!-- Tên danh mục sẽ là liên kết -->

                {{-- Kiểm tra xem mục menu hiện tại có mục con không --}}
                @php
                    $hasChild = $menus->where('parentID', $menu->id)->isNotEmpty();
                @endphp

                {{-- Hiển thị dấu ">" nếu có danh mục con --}}
                @if ($hasChild)
                    <i class="feather-icon icon-chevron-right"></i> <!-- Dấu ">" -->
                @endif
            </a>

            {{-- Nếu có mục con, hiển thị danh sách con với đệ quy --}}
            @if ($hasChild)
                <div id="categoryFlush{{ $menu->id }}" class="accordion-collapse collapse">
                    <div>
                        <ul class="nav flex-column ms-3">
                            {{-- Gọi lại component đệ quy --}}
                            @include('components.submenu2', ['menus' => $menus, 'parentID' => $menu->id])
                        </ul>
                    </div>
                </div>
            @endif
        </li>
    @endif
@endforeach
