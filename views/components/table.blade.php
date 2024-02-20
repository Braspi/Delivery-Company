<div class="overflow-x-auto border border-slate-400 rounded-lg p-4 flex flex-col h-min m-6">
    <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-x-auto overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                <tr>
                    @foreach($headers as $header)
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 border-b border-slate-400 uppercase">{{ $header }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="tbody">
                @foreach($items as $item)
                    @php $formatted = call_user_func($formatter, $item); @endphp
                    <tr>
                        @foreach($headers as $key => $header)
                            @if(isset($formatted[$key]))
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 border-b border-slate-400">{{ $formatted[$key] }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
