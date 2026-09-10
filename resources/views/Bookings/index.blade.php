<style>
    .container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }
    .header-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background-color: #f3f4f6;
        color: #374151;
        text-decoration: none;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        font-size: 14px;
        font-weight: 500;
        transition: background-color 0.2s;
    }
    .btn-back:hover {
        background-color: #e5e7eb;
    }
    .table-card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        overflow-x: auto;
    }
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: 14px;
    }
    .styled-table th {
        background-color: #f9fafb;
        color: #6b7280;
        padding: 12px 16px;
        font-size: 12px;
        text-transform: uppercase;
        border-bottom: 1px solid #e5e7eb;
    }
    .styled-table td {
        padding: 12px 16px;
        border-bottom: 1px solid #e5e7eb;
        color: #374151;
    }
    .styled-table tr:hover {
        background-color: #f9fafb;
    }
    .badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        background-color: #fef3c7;
        color: #92400e;
    }
</style>

<div class="container">
    <div class="header-bar">
        <h2>Bookings List</h2>
        <a href="{{ url()->previous() }}" class="btn-back">&larr; Back to Previous Page</a>
    </div>

    <div class="table-card">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Group Size</th>
                    <th>Preferred Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td><strong>#{{ $booking->id }}</strong></td>
                        <td>{{ $booking->full_name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone_number ?? 'N/A' }}</td>
                        <td>{{ $booking->group_size ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->preferred_date)->format('M d, Y') }}</td>
                        <td><span class="badge">{{ ucfirst($booking->status ?? 'Pending') }}</span></td>
                        <td>{{ $booking->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align: center; color: #6b7280; padding: 24px;">
                            No bookings found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 16px;">
        {{ $bookings->links() }}
    </div>
</div>