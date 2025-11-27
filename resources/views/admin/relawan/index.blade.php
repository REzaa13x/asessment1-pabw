@extends('admin.layouts.master')

@section('content')
<div class="card p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kampanye Relawan</h1>
        <a href="{{ route('admin.relawan.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Buat Kampanye Relawan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Tanggal Selesai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($campaigns as $campaign)
                    <tr class="hover:bg-blue-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $campaign->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $campaign->judul }}</div>
                            <div class="text-sm text-gray-500">{{ $campaign->lokasi }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $campaign->lokasi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($campaign->tanggal_mulai)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ \Carbon\Carbon::parse($campaign->tanggal_selesai)->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($campaign->status == 'Aktif')
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full cursor-pointer" onclick="toggleStatus({{ $campaign->id }}, '{{ $campaign->status }}')">
                                    Aktif
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full cursor-pointer" onclick="toggleStatus({{ $campaign->id }}, '{{ $campaign->status }}')">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="{{ route('admin.relawan.show', ['id' => $campaign->id]) }}"
                               class="text-blue-600 hover:text-blue-900 hover:bg-blue-100 py-1 px-3 rounded-lg transition-colors">
                                <i class="fas fa-eye mr-1"></i> Lihat
                            </a>
                            <a href="{{ route('admin.relawan.edit', ['id' => $campaign->id]) }}"
                               class="text-yellow-600 hover:text-yellow-900 hover:bg-yellow-100 py-1 px-3 rounded-lg transition-colors">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.relawan.delete', ['id' => $campaign->id]) }}" method="POST" class="inline"
                                  onsubmit="return confirm('PERINGATAN: Yakin ingin menghapus? Data akan hilang permanen.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-900 hover:bg-red-100 py-1 px-3 rounded-lg transition-colors">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-sm text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-people-group text-gray-300 text-3xl mb-4"></i>
                                <p>Tidak ada data kampanye relawan</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
async function toggleStatus(campaignId, currentStatus) {
    // Show confirmation dialog
    const newStatus = currentStatus === 'Aktif' ? 'Nonaktif' : 'Aktif';
    const message = `Apakah Anda yakin ingin mengubah status menjadi ${newStatus}?`;

    if (!confirm(message)) {
        return;
    }

    // Show loading indicator on the status element
    const statusElement = event.target;
    const originalText = statusElement.textContent;
    statusElement.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Mengubah...';
    statusElement.style.backgroundColor = '#f3f4f6';
    statusElement.style.color = '#6b7280';

    try {
        const response = await fetch(`/admin/relawan/${campaignId}/toggle-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') || $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val()
            },
            body: JSON.stringify({
                status: newStatus
            })
        });

        if (response.ok) {
            const result = await response.json();

            // Update the UI to reflect the new status
            statusElement.textContent = newStatus;

            // Change background and text color based on status
            if (newStatus === 'Aktif') {
                statusElement.className = 'px-2 py-1 rounded-full text-xs cursor-pointer bg-green-100 text-green-800';
            } else {
                statusElement.className = 'px-2 py-1 rounded-full text-xs cursor-pointer bg-red-100 text-red-800';
            }

            // Show success message
            showNotification('Status kampanye berhasil diperbarui', 'success');
        } else {
            throw new Error('Gagal mengubah status');
        }
    } catch (error) {
        console.error('Error:', error);
        statusElement.textContent = originalText;

        // Restore original styling
        if (currentStatus === 'Aktif') {
            statusElement.className = 'px-2 py-1 rounded-full text-xs cursor-pointer bg-green-100 text-green-800';
        } else {
            statusElement.className = 'px-2 py-1 rounded-full text-xs cursor-pointer bg-red-100 text-red-800';
        }

        showNotification('Gagal mengubah status kampanye', 'error');
    }
}

function showNotification(message, type) {
    // Remove any existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification fixed top-4 right-4 px-6 py-4 rounded-lg shadow-lg z-50 ${
        type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' :
        'bg-red-100 border border-red-400 text-red-700'
    }`;
    notification.innerHTML = message;

    document.body.appendChild(notification);

    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>
@endsection