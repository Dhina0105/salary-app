<div>
    <a href='/attendance' style="text-decoration: none; margin-right: 10px;">attendance</a>
    <form wire:submit.prevent="generatePayroll" class="mb-4">
        <label>Start</label><input type="date" wire:model="start_date">
        <label>End</label><input type="date" wire:model="end_date">
        <button type="submit">Generate Payroll</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Type</th>
                <th>Period </th>
                <th>Hours</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $p)
                <tr>
                    <td>{{ $p->employee->name }}&nbsp;&nbsp;</td>
                    <td>{{ $p->type }}&nbsp;&nbsp;</td>
                    <td>{{ \Carbon\Carbon::parse($p->start_date)->toDateString() }} to {{ \Carbon\Carbon::parse($p->end_date)->toDateString() }}&nbsp;&nbsp;</td>
                    <td>{{ $p->total_hours ?? '-' }}</td>
                    <td>{{ number_format($p->amount,2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payrolls->links() }}
</div>
