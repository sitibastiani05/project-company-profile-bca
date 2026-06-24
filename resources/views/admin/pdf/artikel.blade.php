<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Artikel — Digital Banking</title>
    <style>
        body {
            font-family: 'Helvetica', Arial, sans-serif;
            font-size: 12px;
            color: #333333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }

        /* ── Header ── */
        .header {
            border-bottom: 2px solid #0b1f3a;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }

        .header-title {
            font-size: 20px;
            font-weight: bold;
            color: #0b1f3a;
            text-transform: uppercase;
            margin: 0;
        }

        .header-subtitle {
            font-size: 12px;
            color: #666666;
            margin: 4px 0 0;
        }

        /* ── Meta Info ── */
        .meta-table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .meta-table td {
            padding: 4px 0;
            vertical-align: top;
        }

        .meta-label {
            font-weight: bold;
            color: #555555;
            width: 120px;
        }

        /* ── Table ── */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .data-table th {
            background-color: #0b1f3a;
            color: #ffffff;
            font-weight: bold;
            text-align: left;
            padding: 8px 10px;
            border: 1px solid #0b1f3a;
        }

        .data-table td {
            padding: 8px 10px;
            border: 1px solid #dddddd;
            vertical-align: top;
        }

        .data-table tr:nth-child(even) td {
            background-color: #f9fbfd;
        }

        .badge {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge-published {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .badge-draft {
            background-color: #fff3cd;
            color: #664d03;
        }

        .badge-archived {
            background-color: #e2e3e5;
            color: #41464b;
        }

        /* ── Footer / Signature ── */
        .footer {
            margin-top: 40px;
            text-align: right;
        }

        .signature-title {
            margin-bottom: 50px;
            color: #555555;
        }

        .signature-name {
            font-weight: bold;
            color: #0b1f3a;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="header">
        <table style="width: 100%;">
            <tr>
                <td>
                    <h1 class="header-title">Digital Banking</h1>
                    <p class="header-subtitle">Laporan Manajemen Konten & Publikasi Artikel</p>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 14px; color: #0b1f3a;">
                    LAPORAN ARTIKEL
                </td>
            </tr>
        </table>
    </div>

    <table class="meta-table">
        <tr>
            <td class="meta-label">Tanggal Cetak</td>
            <td>: {{ $tanggalCetak }}</td>
            <td class="meta-label" style="text-align: right;">Total Artikel</td>
            <td style="text-align: right; font-weight: bold; width: 60px;">: {{ $totalData }}</td>
        </tr>
        <tr>
            <td class="meta-label">Dicetak Oleh</td>
            <td>: Administrator Digital Banking</td>
            <td colspan="2"></td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 45%;">Judul Artikel</th>
                <th style="width: 15%;">Kategori</th>
                <th style="width: 15%;">Status</th>
                <th style="width: 20%;">Tanggal Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($artikels as $index => $artikel)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>
                        <strong style="color: #0b1f3a;">{{ $artikel->title }}</strong>
                        <p style="margin: 4px 0 0; font-size: 10.5px; color: #666666;">
                            {{ Str::limit($artikel->description, 150) }}
                        </p>
                    </td>
                    <td>{{ $artikel->kategori }}</td>
                    <td>
                        @if($artikel->status == 'published')
                            <span class="badge badge-published">Published</span>
                        @elseif($artikel->status == 'draft')
                            <span class="badge badge-draft">Draft</span>
                        @else
                            <span class="badge badge-archived">Archived</span>
                        @endif
                    </td>
                    <td>{{ $artikel->created_at->format('d M Y, H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px; color: #666666;">
                        Tidak ada data artikel.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p class="signature-title">Jakarta, {{ now()->locale('id')->isoFormat('D MMMM YYYY') }}<br>Mengetahui,</p>
        <p class="signature-name">Administrator</p>
    </div>

</body>
</html>
