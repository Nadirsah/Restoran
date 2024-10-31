<!-- <nav class="off-canvas-nav">
    <ul class="">
        <li class="menu-item-has-children">
            <a href="#">{{ app()->getLocale() }}</a>
            <ul class="sub-menu">
                @foreach (LaravelLocalization::getSupportedLocales() as $lang=>$properties)
                <li><a class="alang" href="{{LaravelLocalization::getLocalizedURL($lang)}}">{{$lang}}</a>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
</nav> -->
<select onchange="window.location.href = this.value;">
    @foreach (LaravelLocalization::getSupportedLocales() as $lang => $properties)
    <option value="{{ LaravelLocalization::getLocalizedURL($lang) }}"
        @if(LaravelLocalization::getCurrentLocale()==$lang) selected @endif>
        {{ $lang }}
    </option>
    @endforeach
</select>