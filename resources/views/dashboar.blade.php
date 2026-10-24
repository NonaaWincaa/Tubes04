@extends('layouts.app')

@section('title', 'Dashboard - Tubes Web')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/maindashboar.css') }}">
@endpush

@section('content')
<div style="max-width: 1200px; margin: 30px auto; padding: 0 20px;">
    
    <h2 style="color: #4a4062; margin-bottom: 20px; font-size: 1.8rem; font-weight: 700;">Dashboard Utama</h2>

    @if(isset($userStatus) && $userStatus === 'Active')
        <div style="padding: 14px 20px; background: #e6e1f7; color: #6b46c1; border-radius: 12px; margin-bottom: 25px; font-weight: 600; border: 1px solid #dcd5f2;">
            Status akun Anda: Aktif
        </div>
    @else
        <div style="padding: 14px 20px; background: #fff3cd; color: #856404; border-radius: 12px; margin-bottom: 25px; font-weight: 600;">
            Status akun Anda: Non-Aktif
        </div>
    @endif

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
        @if(isset($stats) && is_array($stats))
            @foreach($stats as $item)
                <div style="background: #ffffff; padding: 20px; border-radius: 16px; border: 1px solid #ebe5f5; box-shadow: 0 4px 15px rgba(147, 112, 219, 0.06);">
                    <h3 style="font-size: 0.95rem; color: #8c82a1; font-weight: 600; margin-bottom: 8px;">{{ $item['label'] }}</h3>
                    <p style="font-size: 32px; font-weight: bold; color: #6b46c1; margin: 0;">{{ $item['value'] }}</p>
                </div>
            @endforeach
        @endif
    </div>

    <div style="background: #ffffff; padding: 25px; border-radius: 16px; border: 1px solid #ebe5f5; box-shadow: 0 4px 15px rgba(147, 112, 219, 0.06);">
        <h3 style="color: #6b46c1; margin-bottom: 20px; font-size: 1.2rem; font-weight: 700;">Daftar Tugas (Hasil Seeder Database)</h3>
        
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: #f3effa; color: #6b46c1; font-weight: 600;">
                        <th style="padding: 14px; border-radius: 8px 0 0 8px; width: 60px;">ID</th>
                        <th style="padding: 14px;">Judul Tugas</th>
                        <th style="padding: 14px;">Penanggung Jawab</th>
                        <th style="padding: 14px; width: 160px;">No. Telepon</th>
                        <th style="padding: 14px; width: 130px;">Status</th>
                        <th style="padding: 14px; border-radius: 0 8px 8px 0; width: 130px;">Tenggat Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($tasks) && count($tasks) > 0)
                        @foreach($tasks as $task)
                        <tr style="border-bottom: 1px solid #f0ecf7;">
                            <td style="padding: 14px; color: #8c82a1; font-weight: 600;">{{ $task->id }}</td>
                            <td style="padding: 14px; font-weight: 600; color: #4a4062;">{{ $task->title }}</td>
                            <td style="padding: 14px; color: #5e5373;">{{ $task->assigned_to }}</td>
                            <td style="padding: 14px; color: #5e5373; white-space: nowrap;">{{ $task->phone_number }}</td>
                            <td style="padding: 14px;">
                                <span style="display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; text-align: center;
                                    {{ $task->status === 'Completed' ? 'background: #e6f4ea; color: #137333;' : ($task->status === 'In Progress' ? 'background: #feefc3; color: #b06000;' : 'background: #fce8e6; color: #c5221f;') }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td style="padding: 14px; color: #8c82a1; white-space: nowrap;">{{ $task->due_date }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" style="padding: 20px; text-align: center; color: #8c82a1;">Belum ada data tugas. Jalankan seeder terlebih dahulu.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection