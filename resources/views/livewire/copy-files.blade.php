<div>
    <table>
        <thead>
            <tr>
                <th>Source</th>
                <th></th>
                <th>Target</th>
            </tr>
        </thead>
        <tbody>
            @foreach($folders as $source => $target)
                <tr>
                    <td>{{$source}}</td>
                    <td>=></td>
                    <td>{{$target}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button wire:click="copy" wire:loading.attr="disabled">{{$copyBtnText}}</button>
</div>
