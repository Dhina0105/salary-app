<div>
    <div class="mb-4">
        <a href="/attendance" style="text-decoration: none; margin-right: 10px;">Attendance</a>
        <a href="/payroll/generate" style="text-decoration: none;">PayRollGenerate</a><br><br>

        <label>Month: </label>
        <input type="month" wire:model="month">
        <label>Employee</label>
        <select wire:model="employee_id">
            <option value="">All</option>
            @foreach($employees as $e)
                <option value="{{ $e->id }}">{{ $e->name }}</option>
            @endforeach
        </select>
    </div>

    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Type</th>
                <th>Period</th>
                <th>Hours</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $p)
                <tr>
                    <td>{{ $p->employee->name }}</td>
                    <td>{{ $p->type }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->start_date)->toDateString() }} to {{ \Carbon\Carbon::parse($p->end_date)->toDateString() }}</td>
                    <td>{{ $p->total_hours ?? '-' }}</td>
                    <td>{{ number_format($p->amount,2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payrolls->links() }}
</div>
