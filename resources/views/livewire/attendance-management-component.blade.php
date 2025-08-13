<div>
    <a href=/payroll/generate style="text-decoration: none; margin-right: 10px;"> PayRollGenerate</a><br>
    <h3>Attendence Page</h3>
    <form wire:submit.prevent="saveAttendance" class="mb-4">
        <select wire:model="employee_id">
            <option value="">Select employee</option>
            @foreach($employees as $e)
                <option value="{{ $e->id }}">{{ $e->name }} ({{ $e->salary_type }})</option>
            @endforeach
        </select>
        <input type="date" wire:model="date">
        <input type="number" step="0.25" wire:model="hours_worked" placeholder="Hours">
        <button type="submit">Save</button>
    </form>

    <table class="w-full">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $r)
                <tr>
                    <td>{{ $r->employee->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->date)->toDateString() }}</td>
                    <td>{{ $r->hours_worked }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $records->links() }}
</div>
