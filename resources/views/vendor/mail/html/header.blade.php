<tr>
    <td class="header">
         <a href="{{ $url }}" style="display: inline-block;">
            @if ($slot->isEmpty()) 
                <img src="{{ asset('/images/mailing-header.jpg')}}" alt="header"/>
            @else
                {{ $slot }}
            @endif
        </a> 
    </td>
</tr>
