<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegencySeeder extends Seeder
{
    private array $aceh = [
        ['name' => 'Kab. Aceh Selatan'],
        ['name' => 'Kab. Aceh Tenggara'],
        ['name' => 'Kab. Aceh Timur'],
        ['name' => 'Kab. Aceh Tengah'],
        ['name' => 'Kab. Aceh Barat'],
        ['name' => 'Kab. Aceh Besar'],
        ['name' => 'Kab. Pidie'],
        ['name' => 'Kab. Aceh Utara'],
        ['name' => 'Kab. Simeulue'],
        ['name' => 'Kab. Aceh Singkil'],
        ['name' => 'Kab. Bireuen'],
        ['name' => 'Kab. Aceh Barat Daya'],
        ['name' => 'Kab. Gayo Lues'],
        ['name' => 'Kab. Aceh Jaya'],
        ['name' => 'Kab. Nagan Raya'],
        ['name' => 'Kab. Aceh Tamiang'],
        ['name' => 'Kab. Bener Meriah'],
        ['name' => 'Kab. Pidie Jaya'],
        ['name' => 'Kota Banda Aceh'],
        ['name' => 'Kota Sabang'],
        ['name' => 'Kota Lhokseumawe'],
        ['name' => 'Kota Langsa'],
        ['name' => 'Kota Subulussalam'],
    ];

    private array $sumut = [
        ['name' => 'Kab. Asahan'],
        ['name' => 'Kab. Dairi'],
        ['name' => 'Kab. Deli Serdang'],
        ['name' => 'Kab. Humbang Hasundutan'],
        ['name' => 'Kab. Karo'],
        ['name' => 'Kab. Labuhanbatu'],
        ['name' => 'Kab. Labuhanbatu Selatan'],
        ['name' => 'Kab. Labuhanbatu Utara'],
        ['name' => 'Kab. Langkat'],
        ['name' => 'Kab. Mandailing Natal'],
        ['name' => 'Kab. Nias'],
        ['name' => 'Kab. Nias Barat'],
        ['name' => 'Kab. Nias Selatan'],
        ['name' => 'Kab. Nias Utara'],
        ['name' => 'Kab. Pakpak Bharat'],
        ['name' => 'Kab. Padang Lawas'],
        ['name' => 'Kab. Padang Lawas Utara'],
        ['name' => 'Kab. Samosir'],
        ['name' => 'Kab. Serdang Bedagai'],
        ['name' => 'Kab. Simalungun'],
        ['name' => 'Kab. Tapanuli Selatan'],
        ['name' => 'Kab. Tapanuli Tengah'],
        ['name' => 'Kab. Tapanuli Utara'],
        ['name' => 'Kab. Toba'],
        ['name' => 'Kota Binjai'],
        ['name' => 'Kota Gunungsitoli'],
        ['name' => 'Kota Medan'],
        ['name' => 'Kota Padangsidimpuan'],
        ['name' => 'Kota Pematangsiantar'],
        ['name' => 'Kota Sibolga'],
        ['name' => 'Kota Tanjung Balai'],
        ['name' => 'Kota Tebing Tinggi'],
    ];

    private array $sumbar = [
        ['name' => 'Kab. Agam'],
        ['name' => 'Kab. Dharmasraya'],
        ['name' => 'Kab. Kepulauan Mentawai'],
        ['name' => 'Kab. Lima Puluh Kota'],
        ['name' => 'Kab. Padang Pariaman'],
        ['name' => 'Kab. Pasaman'],
        ['name' => 'Kab. Pasaman Barat'],
        ['name' => 'Kab. Pesisir Selatan'],
        ['name' => 'Kab. Sijunjung'],
        ['name' => 'Kab. Solok'],
        ['name' => 'Kab. Solok Selatan'],
        ['name' => 'Kab. Tanah Datar'],
        ['name' => 'Kota Bukittinggi'],
        ['name' => 'Kota Padang'],
        ['name' => 'Kota Padang Panjang'],
        ['name' => 'Kota Pariaman'],
        ['name' => 'Kota Payakumbuh'],
        ['name' => 'Kota Sawahlunto'],
        ['name' => 'Kota Solok'],
    ];

    private array $riau = [
        ['name' => 'Kab. Bengkalis'],
        ['name' => 'Kab. Indragiri Hulu'],
        ['name' => 'Kab. Indragiri Hilir'],
        ['name' => 'Kab. Kampar'],
        ['name' => 'Kab. Kepulauan Meranti'],
        ['name' => 'Kab. Kuantan Singingi'],
        ['name' => 'Kab. Pelalawan'],
        ['name' => 'Kab. Rokan Hilir'],
        ['name' => 'Kab. Rokan Hulu'],
        ['name' => 'Kab. Siak'],
        ['name' => 'Kota Dumai'],
        ['name' => 'Kota Pekanbaru'],
    ];

    private array $jambi = [
        ['name' => 'Kab. Batanghari'],
        ['name' => 'Kab. Bungo'],
        ['name' => 'Kab. Kerinci'],
        ['name' => 'Kab. Kuantan Singingi'],
        ['name' => 'Kab. Merangin'],
        ['name' => 'Kab. Muaro Jambi'],
        ['name' => 'Kab. Sarolangun'],
        ['name' => 'Kab. Tanjung Jabung Barat'],
        ['name' => 'Kab. Tanjung Jabung Timur'],
        ['name' => 'Kab. Tebo'],
        ['name' => 'Kota Jambi'],
        ['name' => 'Kota Sungai Penuh'],
    ];

    private array $sumsel = [
        ['name' => 'Kab. Banyuasin'],
        ['name' => 'Kab. Empat Lawang'],
        ['name' => 'Kab. Lahat'],
        ['name' => 'Kab. Muara Enim'],
        ['name' => 'Kab. Musi Banyuasin'],
        ['name' => 'Kab. Musi Rawas'],
        ['name' => 'Kab. Musi Rawas Utara'],
        ['name' => 'Kab. Ogan Ilir'],
        ['name' => 'Kab. Ogan Komering Ilir'],
        ['name' => 'Kab. Ogan Komering Ulu'],
        ['name' => 'Kab. Ogan Komering Ulu Selatan'],
        ['name' => 'Kab. Ogan Komering Ulu Timur'],
        ['name' => 'Kab. Penukal Abab Lematang Ilir'],
        ['name' => 'Kota Lubuk Linggau'],
        ['name' => 'Kota Palembang'],
        ['name' => 'Kota Pagar Alam'],
        ['name' => 'Kota Prabumulih'],
    ];

    private array $bengkulu = [
        ['name' => 'Kab. Bengkulu Selatan'],
        ['name' => 'Kab. Bengkulu Tengah'],
        ['name' => 'Kab. Bengkulu Utara'],
        ['name' => 'Kab. Kaur'],
        ['name' => 'Kab. Kepahiang'],
        ['name' => 'Kab. Lebong'],
        ['name' => 'Kab. Muko Muko'],
        ['name' => 'Kab. Rejang Lebong'],
        ['name' => 'Kab. Seluma'],
        ['name' => 'Kota Bengkulu'],
    ];

    private array $lampung = [
        ['name' => 'Kab. Lampung Barat'],
        ['name' => 'Kab. Lampung Selatan'],
        ['name' => 'Kab. Lampung Tengah'],
        ['name' => 'Kab. Lampung Timur'],
        ['name' => 'Kab. Lampung Utara'],
        ['name' => 'Kab. Mesuji'],
        ['name' => 'Kab. Pesisir Barat'],
        ['name' => 'Kab. Pesawaran'],
        ['name' => 'Kab. Pringsewu'],
        ['name' => 'Kab. Tanggamus'],
        ['name' => 'Kab. Tulang Bawang'],
        ['name' => 'Kab. Tulang Bawang Barat'],
        ['name' => 'Kab. Way Kanan'],
        ['name' => 'Kota Bandar Lampung'],
        ['name' => 'Kota Metro'],
    ];

    private array $bangkaBelitung = [
        ['name' => 'Kab. Bangka'],
        ['name' => 'Kab. Bangka Barat'],
        ['name' => 'Kab. Bangka Selatan'],
        ['name' => 'Kab. Bangka Tengah'],
        ['name' => 'Kab. Belitung'],
        ['name' => 'Kab. Belitung Timur'],
        ['name' => 'Kota Pangkal Pinang'],
    ];

    private array $kepulauanRiau = [
        ['name' => 'Kab. Bintan'],
        ['name' => 'Kab. Karimun'],
        ['name' => 'Kab. Kepulauan Anambas'],
        ['name' => 'Kab. Lingga'],
        ['name' => 'Kab. Natuna'],
        ['name' => 'Kota Batam'],
        ['name' => 'Kota Tanjung Pinang'],
    ];

    private array $jakarta = [
        ['name' => 'Kab. Adm. Kep. Seribu'],
        ['name' => 'Kota Adm. Jakarta Barat'],
        ['name' => 'Kota Adm. Jakarta Pusat'],
        ['name' => 'Kota Adm. Jakarta Selatan'],
        ['name' => 'Kota Adm. Jakarta Timur'],
        ['name' => 'Kota Adm. Jakarta Utara'],
    ];

    private array $jabar = [
        ['name' => 'Kab. Bandung'],
        ['name' => 'Kab. Bandung Barat'],
        ['name' => 'Kab. Banjar'],
        ['name' => 'Kab. Ciamis'],
        ['name' => 'Kab. Cianjur'],
        ['name' => 'Kab. Cirebon'],
        ['name' => 'Kab. Garut'],
        ['name' => 'Kab. Indramayu'],
        ['name' => 'Kab. Karawang'],
        ['name' => 'Kab. Kuningan'],
        ['name' => 'Kab. Majalengka'],
        ['name' => 'Kab. Purwakarta'],
        ['name' => 'Kab. Sukabumi'],
        ['name' => 'Kab. Sumedang'],
        ['name' => 'Kab. Tasikmalaya'],
        ['name' => 'Kota Bandung'],
        ['name' => 'Kota Banjar'],
        ['name' => 'Kota Bekasi'],
        ['name' => 'Kota Bogor'],
        ['name' => 'Kota Cimahi'],
        ['name' => 'Kota Cirebon'],
        ['name' => 'Kota Depok'],
        ['name' => 'Kota Sukabumi'],
        ['name' => 'Kota Tasikmalaya'],
    ];

    private array $jateng = [
        ['name' => 'Kab. Banyumas'],
        ['name' => 'Kab. Batang'],
        ['name' => 'Kab. Blora'],
        ['name' => 'Kab. Boyolali'],
        ['name' => 'Kab. Brebes'],
        ['name' => 'Kab. Cilacap'],
        ['name' => 'Kab. Demak'],
        ['name' => 'Kab. Grobogan'],
        ['name' => 'Kab. Jepara'],
        ['name' => 'Kab. Karanganyar'],
        ['name' => 'Kab. Kebumen'],
        ['name' => 'Kab. Kendal'],
        ['name' => 'Kab. Klaten'],
        ['name' => 'Kab. Kudus'],
        ['name' => 'Kab. Magelang'],
        ['name' => 'Kab. Pemalang'],
        ['name' => 'Kab. Pati'],
        ['name' => 'Kab. Purbalingga'],
        ['name' => 'Kab. Purworejo'],
        ['name' => 'Kab. Rembang'],
        ['name' => 'Kab. Semarang'],
        ['name' => 'Kab. Sragen'],
        ['name' => 'Kab. Sukoharjo'],
        ['name' => 'Kab. Tegal'],
        ['name' => 'Kab. Temanggung'],
        ['name' => 'Kab. Wonosobo'],
        ['name' => 'Kota Magelang'],
        ['name' => 'Kota Pekalongan'],
        ['name' => 'Kota Salatiga'],
        ['name' => 'Kota Semarang'],
        ['name' => 'Kota Surakarta'],
        ['name' => 'Kota Tegal'],
    ];

    private array $yogyakarta = [
        ['name' => 'Kab. Bantul'],
        ['name' => 'Kab. Gunungkidul'],
        ['name' => 'Kab. Kulon Progo'],
        ['name' => 'Kab. Sleman'],
        ['name' => 'Kota Yogyakarta'],
    ];

    private array $jatim = [
        ['name' => 'Kab. Pacitan'],
        ['name' => 'Kab. Ponorogo'],
        ['name' => 'Kab. Trenggalek'],
        ['name' => 'Kab. Tulungagung'],
        ['name' => 'Kab. Blitar'],
        ['name' => 'Kab. Kediri'],
        ['name' => 'Kab. Malang'],
        ['name' => 'Kab. Lumajang'],
        ['name' => 'Kab. Jember'],
        ['name' => 'Kab. Banyuwangi'],
        ['name' => 'Kab. Bondowoso'],
        ['name' => 'Kab. Situbondo'],
        ['name' => 'Kab. Probolinggo'],
        ['name' => 'Kab. Pasuruan'],
        ['name' => 'Kab. Sidoarjo'],
        ['name' => 'Kab. Mojokerto'],
        ['name' => 'Kab. Jombang'],
        ['name' => 'Kab. Nganjuk'],
        ['name' => 'Kab. Madiun'],
        ['name' => 'Kab. Magetan'],
        ['name' => 'Kab. Ngawi'],
        ['name' => 'Kab. Bojonegoro'],
        ['name' => 'Kab. Tuban'],
        ['name' => 'Kab. Lamongan'],
        ['name' => 'Kab. Gresik'],
        ['name' => 'Kab. Bangkalan'],
        ['name' => 'Kab. Sampang'],
        ['name' => 'Kab. Pamekasan'],
        ['name' => 'Kab. Sumenep'],
        ['name' => 'Kota Kediri'],
        ['name' => 'Kota Blitar'],
        ['name' => 'Kota Malang'],
        ['name' => 'Kota Probolinggo'],
        ['name' => 'Kota Pasuruan'],
        ['name' => 'Kota Mojokerto'],
        ['name' => 'Kota Madiun'],
        ['name' => 'Kota Surabaya'],
        ['name' => 'Kota Batu'],
    ];

    private array $banten = [
        ['name' => 'Kab. Pandeglang'],
        ['name' => 'Kab. Lebak'],
        ['name' => 'Kab. Tangerang'],
        ['name' => 'Kab. Serang'],
        ['name' => 'Kota Tangerang'],
        ['name' => 'Kota Cilegon'],
        ['name' => 'Kota Serang'],
        ['name' => 'Kota Tangerang Selatan'],
    ];

    private array $bali = [
        ['name' => 'Kab. Jembrana'],
        ['name' => 'Kab. Tabanan'],
        ['name' => 'Kab. Badung'],
        ['name' => 'Kab. Gianyar'],
        ['name' => 'Kab. Klungkung'],
        ['name' => 'Kab. Bangli'],
        ['name' => 'Kab. Karangasem'],
        ['name' => 'Kab. Buleleng'],
        ['name' => 'Kota Denpasar'],
    ];

    private array $ntb = [
        ['name' => 'Kab. Lombok Barat'],
        ['name' => 'Kab. Lombok Tengah'],
        ['name' => 'Kab. Lombok Timur'],
        ['name' => 'Kab. Sumbawa'],
        ['name' => 'Kab. Dompu'],
        ['name' => 'Kab. Bima'],
        ['name' => 'Kab. Sumbawa Barat'],
        ['name' => 'Kab. Lombok Utara'],
        ['name' => 'Kota Mataram'],
        ['name' => 'Kota Bima'],
    ];

    private array $ntt = [
        ['name' => 'Kab. Kupang'],
        ['name' => 'Kab Timor Tengah Selatan'],
        ['name' => 'Kab. Timor Tengah Utara'],
        ['name' => 'Kab. Belu'],
        ['name' => 'Kab. Alor'],
        ['name' => 'Kab. Flores Timur'],
        ['name' => 'Kab. Sikka'],
        ['name' => 'Kab. Ende'],
        ['name' => 'Kab. Ngada'],
        ['name' => 'Kab. Manggarai'],
        ['name' => 'Kab. Sumba Timur'],
        ['name' => 'Kab. Sumba Barat'],
        ['name' => 'Kab. Lembata'],
        ['name' => 'Kab. Rote Ndao'],
        ['name' => 'Kab. Manggarai Barat'],
        ['name' => 'Kab. Nagekeo'],
        ['name' => 'Kab. Sumba Tengah'],
        ['name' => 'Kab. Sumba Barat Daya'],
        ['name' => 'Kab. Manggarai Timur'],
        ['name' => 'Kab. Sabu Raijua'],
        ['name' => 'Kab. Malaka'],
        ['name' => 'Kota Kupang'],
    ];

    private array $kalbar = [
        ['name' => 'Kab. Sambas'],
        ['name' => 'Kab. Mempawah'],
        ['name' => 'Kab. Sanggau'],
        ['name' => 'Kab. Ketapang'],
        ['name' => 'Kab. Sintang'],
        ['name' => 'Kab. Kapuas Hulu'],
        ['name' => 'Kab. Bengkayang'],
        ['name' => 'Kab. Landak'],
        ['name' => 'Kab. Sekadau'],
        ['name' => 'Kab. Melawi'],
        ['name' => 'Kab. Kayong Utara'],
        ['name' => 'Kab. Kubu Raya'],
        ['name' => 'Kota Pontianak'],
        ['name' => 'Kota Singkawang'],
    ];

    private array $kalteng = [
        ['name' => 'Kab. Kotawaringin Barat'],
        ['name' => 'Kab. Kotawaringin Timur'],
        ['name' => 'Kab. Kapuas'],
        ['name' => 'Kab. Barito Selatan'],
        ['name' => 'Kab. Barito Utara'],
        ['name' => 'Kab. Katingan'],
        ['name' => 'Kab. Seruyan'],
        ['name' => 'Kab. Sukamara'],
        ['name' => 'Kab. Lamandau'],
        ['name' => 'Kab. Gunung Mas'],
        ['name' => 'Kab. Pulang Pisau'],
        ['name' => 'Kab. Murung Raya'],
        ['name' => 'Kab. Barito Timur'],
        ['name' => 'Kota Palangkaraya'],
    ];

    private array $kalsel = [
        ['name' => 'Kab. Tanah Laut'],
        ['name' => 'Kab. Kotabaru'],
        ['name' => 'Kab. Banjar'],
        ['name' => 'Kab. Barito Kuala'],
        ['name' => 'Kab. Tapin'],
        ['name' => 'Kab. Hulu Sungai Selatan'],
        ['name' => 'Kab. Hulu Sungai Tengah'],
        ['name' => 'Kab. Hulu Sungai Utara'],
        ['name' => 'Kab. Tabalong'],
        ['name' => 'Kab. Tanah Bumbu'],
        ['name' => 'Kab. Balangan'],
        ['name' => 'Kota Banjarmasin'],
        ['name' => 'Kota Banjarbaru'],
    ];

    private array $kaltim = [
        ['name' => 'Kab. Paser'],
        ['name' => 'Kab. Kutai Kartanegara'],
        ['name' => 'Kab. Berau'],
        ['name' => 'Kab. Kutai Barat'],
        ['name' => 'Kab. Kutai Timur'],
        ['name' => 'Kab. Penajam Paser Utara'],
        ['name' => 'Kab. Mahakam Ulu'],
        ['name' => 'Kota Balikpapan'],
        ['name' => 'Kota Samarinda'],
        ['name' => 'Kota Bontang'],
    ];

    private array $kaltara = [
        ['name' => 'Kab. Bulungan'],
        ['name' => 'Kab. Malinau'],
        ['name' => 'Kab. Nunukan'],
        ['name' => 'Kab. Tana Tidung'],
        ['name' => 'Kota Tarakan'],
    ];

    private array $sulut = [
        ['name' => 'Kab. Bolaang Mongondow'],
        ['name' => 'Kab. Minahasa'],
        ['name' => 'Kab. Kepulauan Sangihe'],
        ['name' => 'Kab. Kepulauan Talaud'],
        ['name' => 'Kab. Minahasa Selatan'],
        ['name' => 'Kab. Minahasa Utara'],
        ['name' => 'Kab. Minahasa Tenggara'],
        ['name' => 'Kab. Bolaang Mongondow Utara'],
        ['name' => 'Kab. Kep. Siau Tagulandang Biaro'],
        ['name' => 'Kab. Bolaang Mongondow Timur'],
        ['name' => 'Kab. Bolaang Mongondow Selatan'],
        ['name' => 'Kota Manado'],
        ['name' => 'Kota Bitung'],
        ['name' => 'Kota Tomohon'],
        ['name' => 'Kota Kotamobagu'],
    ];

    private array $sulteng = [
        ['name' => 'Kab. Banggai'],
        ['name' => 'Kab. Poso'],
        ['name' => 'Kab. Donggala'],
        ['name' => 'Kab. Toli Toli'],
        ['name' => 'Kab. Buol'],
        ['name' => 'Kab. Morowali'],
        ['name' => 'Kab. Banggai Kepulauan'],
        ['name' => 'Kab. Parigi Moutong'],
        ['name' => 'Kab. Tojo Una Una'],
        ['name' => 'Kab. Sigi'],
        ['name' => 'Kab. Banggai Laut'],
        ['name' => 'Kab. Morowali Utara'],
        ['name' => 'Kota Palu'],
    ];

    private array $sulsel = [
        ['name' => 'Kab. Kepulauan Selayar'],
        ['name' => 'Kab. Bulukumba'],
        ['name' => 'Kab. Bantaeng'],
        ['name' => 'Kab. Jeneponto'],
        ['name' => 'Kab. Takalar'],
        ['name' => 'Kab. Gowa'],
        ['name' => 'Kab. Sinjai'],
        ['name' => 'Kab. Bone'],
        ['name' => 'Kab. Maros'],
        ['name' => 'Kab. Pangkajene Kepulauan'],
        ['name' => 'Kab. Barru'],
        ['name' => 'Kab. Soppeng'],
        ['name' => 'Kab. Wajo'],
        ['name' => 'Kab. Sidenreng Rappang'],
        ['name' => 'Kab. Pinrang'],
        ['name' => 'Kab. Enrekang'],
        ['name' => 'Kab. Luwu'],
        ['name' => 'Kab. Tana Toraja'],
        ['name' => 'Kab. Luwu Utara'],
        ['name' => 'Kab. Luwu Timur'],
        ['name' => 'Kab. Toraja Utara'],
        ['name' => 'Kota Makassar'],
        ['name' => 'Kota Pare Pare'],
        ['name' => 'Kota Palopo'],
    ];

    private array $sultra = [
        ['name' => 'Kab. Kolaka'],
        ['name' => 'Kab. Konawe'],
        ['name' => 'Kab. Muna'],
        ['name' => 'Kab. Buton'],
        ['name' => 'Kab. Konawe Selatan'],
        ['name' => 'Kab. Bombana'],
        ['name' => 'Kab. Wakatobi'],
        ['name' => 'Kab. Kolaka Utara'],
        ['name' => 'Kab. Konawe Utara'],
        ['name' => 'Kab. Buton Utara'],
        ['name' => 'Kab. Kolaka Timur'],
        ['name' => 'Kab. Konawe Kepulauan'],
        ['name' => 'Kab. Muna Barat'],
        ['name' => 'Kab. Buton Tengah'],
        ['name' => 'Kab. Buton Selatan'],
        ['name' => 'Kota Kendari'],
        ['name' => 'Kota Bau Bau'],
    ];

    private array $gorontalo = [
        ['name' => 'Kab. Gorontalo'],
        ['name' => 'Kab. Boalemo'],
        ['name' => 'Kab. Bone Bolango'],
        ['name' => 'Kab. Pahuwato'],
        ['name' => 'Kab. Gorontalo Utara'],
        ['name' => 'Kota Gorontalo'],
    ];

    private array $sulbar = [
        ['name' => 'Kab. Pasangkayu'],
        ['name' => 'Kab. Mamuju'],
        ['name' => 'Kab. Mamasa'],
        ['name' => 'Kab. Polewali Mandar'],
        ['name' => 'Kab. Majene'],
        ['name' => 'Kab. Mamuju Tengah'],
    ];

    private array $maluku = [
        ['name' => 'Kab. Maluku Tengah'],
        ['name' => 'Kab. Maluku Tenggara'],
        ['name' => 'Kab. Kepulauan Tanimbar'],
        ['name' => 'Kab. Buru'],
        ['name' => 'Kab. Seram Bagian Timur'],
        ['name' => 'Kab. Seram Bagian Barat'],
        ['name' => 'Kab. Kepulauan Aru'],
        ['name' => 'Kab. Maluku Barat Daya'],
        ['name' => 'Kab. Buru Selatan'],
        ['name' => 'Kota Ambon'],
        ['name' => 'Kota Tual'],
    ];

    private array $malukuUtara = [
        ['name' => 'Kab. Halmahera Barat'],
        ['name' => 'Kab. Halmahera Tengah'],
        ['name' => 'Kab. Halmahera Utara'],
        ['name' => 'Kab. Halmahera Selatan'],
        ['name' => 'Kab. Kepulauan Sula'],
        ['name' => 'Kab. Halmahera Timur'],
        ['name' => 'Kab. Pulau Morotai'],
        ['name' => 'Kab. Pulau Taliabu'],
        ['name' => 'Kota Ternate'],
        ['name' => 'Kota Tidore Kepulauan'],
    ];

    private array $papua = [
        ['name' => 'Kab. Jayapura'],
        ['name' => 'Kab. Kepulauan Yapen'],
        ['name' => 'Kab. Biak Numfor'],
        ['name' => 'Kab. Sarmi'],
        ['name' => 'Kab. Keerom'],
        ['name' => 'Kab. Waropen'],
        ['name' => 'Kab. Supiori'],
        ['name' => 'Kab. Mamberamo Raya'],
        ['name' => 'Kota Jayapura'],
    ];

    private array $papuaBarat = [
        ['name' => 'Kab. Fak Fak'],
        ['name' => 'Kab. Kaimana'],
        ['name' => 'Kab. Manokwari'],
        ['name' => 'Kab. Manokwari Selatan'],
        ['name' => 'Kab. Pegunungan Arfak'],
        ['name' => 'Kab. Teluk Bintuni'],
        ['name' => 'Kab. Teluk Wondama'],
    ];

    private array $papuaBaratDaya = [
        ['name' => 'Kab. Maybrat'],
        ['name' => 'Kab. Sorong'],
        ['name' => 'Kab. Sorong Selatan'],
        ['name' => 'Kab. Raja Ampat'],
        ['name' => 'Kab. Tambrauw'],
        ['name' => 'Kota Sorong'],

    ];

    private array $papuaSelatan = [
        ['name' => 'Kab. Merauke'],
        ['name' => 'Kab. Boven Digoel'],
        ['name' => 'Kab. Mappi'],
        ['name' => 'Kab. Asmat'],
    ];

    private array $papuaTengah = [
        ['name' => 'Kab. Nabire'],
        ['name' => 'Kab. Puncak Jaya'],
        ['name' => 'Kab. Paniai'],
        ['name' => 'Kab. Mimika'],
        ['name' => 'Kab. Puncak'],
        ['name' => 'Kab. Dogiyai'],
        ['name' => 'Kab. Intan Jaya'],
        ['name' => 'Kab. Deiyai'],
    ];

    private array $papuaPegunungan = [
        ['name' => 'Kab. Jayawijaya'],
        ['name' => 'Kab. Pegunungan Bintang'],
        ['name' => 'Kab. Yahukimo'],
        ['name' => 'Kab. Tolikara'],
        ['name' => 'Kab. Mamberamo Tengah'],
        ['name' => 'Kab. Yalimo'],
        ['name' => 'Kab. Lanny Jaya'],
        ['name' => 'Kab. Nduga'],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regencies')->insert([
            ...$this->spreadIt($this->aceh, 1),
            ...$this->spreadIt($this->sumut, 2),
            ...$this->spreadIt($this->sumsel, 3),
            ...$this->spreadIt($this->sumbar, 4),
            ...$this->spreadIt($this->bengkulu, 5),
            ...$this->spreadIt($this->riau, 6),
            ...$this->spreadIt($this->kepulauanRiau, 7),
            ...$this->spreadIt($this->jambi, 8),
            ...$this->spreadIt($this->lampung, 9),
            ...$this->spreadIt($this->bangkaBelitung, 10),
            ...$this->spreadIt($this->kalbar, 11),
            ...$this->spreadIt($this->kaltim, 12),
            ...$this->spreadIt($this->kalsel, 13),
            ...$this->spreadIt($this->kalteng, 14),
            ...$this->spreadIt($this->kaltara, 15),
            ...$this->spreadIt($this->banten, 16),
            ...$this->spreadIt($this->jakarta, 17),
            ...$this->spreadIt($this->jabar, 18),
            ...$this->spreadIt($this->jateng, 19),
            ...$this->spreadIt($this->yogyakarta, 20),
            ...$this->spreadIt($this->jatim, 21),
            ...$this->spreadIt($this->bali, 22),
            ...$this->spreadIt($this->ntt, 23),
            ...$this->spreadIt($this->ntb, 24),
            ...$this->spreadIt($this->gorontalo, 25),
            ...$this->spreadIt($this->sulbar, 26),
            ...$this->spreadIt($this->sulteng, 27),
            ...$this->spreadIt($this->sulut, 28),
            ...$this->spreadIt($this->sultra, 29),
            ...$this->spreadIt($this->sulsel, 30),
            ...$this->spreadIt($this->malukuUtara, 31),
            ...$this->spreadIt($this->maluku, 32),
            ...$this->spreadIt($this->papua, 33),
            ...$this->spreadIt($this->papuaBarat, 34),
            ...$this->spreadIt($this->papuaBaratDaya, 35),
            ...$this->spreadIt($this->papuaTengah, 36),
            ...$this->spreadIt($this->papuaPegunungan, 37),
            ...$this->spreadIt($this->papuaSelatan, 38),
        ]);
    }

    private function spreadIt(array $region, int $regionId): array
    {
        return array_map(fn (array $e) => [
            'name' => $e['name'],
            'region_id' => $regionId,
            'created_at' => now(),
            'updated_at' => now(),
        ], $region);
    }
}
