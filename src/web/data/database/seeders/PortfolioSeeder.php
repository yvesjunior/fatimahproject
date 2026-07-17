<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Gallery images are hosted on ImageKit. This maps the original
     * gallery slot (sort_order) => [imagekit_url, imagekit_file_id].
     * Regenerate after re-uploading images (php artisan portfolio:migrate-images).
     */
    public function run(): void
    {
        $items = array (
  1 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/1__C70bIrFz.jpg',
    1 => '6a59bfd65c7cd75eb8176cb2',
  ),
  2 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/2_enp9WcNK3.jpg',
    1 => '6a59bfd65c7cd75eb8176f48',
  ),
  3 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/3_sU1NiGXFE.jpg',
    1 => '6a59bfd65c7cd75eb8177101',
  ),
  4 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/4_rhXEfJZPRa.jpg',
    1 => '6a59bfd75c7cd75eb817735c',
  ),
  5 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/5_zINieo0rc.jpg',
    1 => '6a59bfd75c7cd75eb8177553',
  ),
  6 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/6_PO4oX1rsM.jpg',
    1 => '6a59bfd75c7cd75eb8177668',
  ),
  7 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/7_BpzmCFPnQa.jpg',
    1 => '6a59bfd85c7cd75eb81778fe',
  ),
  8 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/8_oTMdPLcvE.jpg',
    1 => '6a59bfd85c7cd75eb81779d9',
  ),
  9 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/9_EhQHeGrdP.jpg',
    1 => '6a59bfd85c7cd75eb8177c2e',
  ),
  10 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/10_lTSsP4X4x.jpg',
    1 => '6a59bfd85c7cd75eb8177e28',
  ),
  11 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/11_yOGsjd21A.jpg',
    1 => '6a59bfd95c7cd75eb8177f5b',
  ),
  12 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/12_aJR-Xt-Djs.jpg',
    1 => '6a59bfd95c7cd75eb8178116',
  ),
  13 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/13_pMZscLlmIN.jpg',
    1 => '6a59bfd95c7cd75eb81782b1',
  ),
  14 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/14_TpkL_lKp-.jpg',
    1 => '6a59bfda5c7cd75eb817850f',
  ),
  15 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/15_GUA7yn7UV.jpg',
    1 => '6a59bfda5c7cd75eb817862b',
  ),
  16 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/16_LuUltJXK0w.jpg',
    1 => '6a59bfda5c7cd75eb8178897',
  ),
  17 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/17_lwt7vmf6L.jpg',
    1 => '6a59bfdb5c7cd75eb8178a4d',
  ),
  18 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/18_K0FTdUlQ3.jpg',
    1 => '6a59bfdb5c7cd75eb8178c5a',
  ),
  19 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/19_sQ6xxSaU_.jpg',
    1 => '6a59bfdb5c7cd75eb8178d8c',
  ),
  20 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/20_UGaiclwBg.jpg',
    1 => '6a59bfdb5c7cd75eb8178f93',
  ),
  21 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/21_cYvpV1YRw.jpg',
    1 => '6a59bfdc5c7cd75eb8179146',
  ),
  22 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/22_qmutorQrn.jpg',
    1 => '6a59bfdc5c7cd75eb8179331',
  ),
  23 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/23_QN41KsWGdv.jpg',
    1 => '6a59bfdc5c7cd75eb8179827',
  ),
  24 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/24_B_gQFuwgD.jpg',
    1 => '6a59bfdd5c7cd75eb817a137',
  ),
  25 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/25_VASZmLoIH.jpg',
    1 => '6a59bfdd5c7cd75eb817a78b',
  ),
  26 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/26_8c4uPz_u7d.jpg',
    1 => '6a59bfdd5c7cd75eb817b122',
  ),
  27 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/27_-tyPrAbM5.jpg',
    1 => '6a59bfde5c7cd75eb817b43a',
  ),
  28 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/28_ln5dQDIZH2.jpg',
    1 => '6a59bfde5c7cd75eb817b70c',
  ),
  29 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/29_mYDzCAAWE.jpg',
    1 => '6a59bfde5c7cd75eb817b958',
  ),
  30 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/30_H-L2djUBR7.jpg',
    1 => '6a59bfdf5c7cd75eb817bafb',
  ),
  31 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/31_oqan6Vm-l.jpg',
    1 => '6a59bfdf5c7cd75eb817bc0b',
  ),
  32 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/32_3sQHvoAcV.jpg',
    1 => '6a59bfdf5c7cd75eb817be14',
  ),
  33 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/33_Nc_WYsVUcq.jpg',
    1 => '6a59bfdf5c7cd75eb817c0dc',
  ),
  34 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/34_w0es2_CLs.jpg',
    1 => '6a59bfe05c7cd75eb817c239',
  ),
  35 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/35__izxSsmQKi.jpg',
    1 => '6a59bfe05c7cd75eb817c4bf',
  ),
  36 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/36_FXTHjdXIi.jpg',
    1 => '6a59bfe05c7cd75eb817c5e3',
  ),
  37 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/37_POTTqnszh.jpg',
    1 => '6a59bfe15c7cd75eb817c7e8',
  ),
  38 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/38_-Sf-2VCA_.jpg',
    1 => '6a59bfe15c7cd75eb817caaf',
  ),
  39 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/39_EG9nSdYN5C.jpg',
    1 => '6a59bfe15c7cd75eb817cb7b',
  ),
  40 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/40_mO0iRw6QWA.jpg',
    1 => '6a59bfe15c7cd75eb817cda9',
  ),
  41 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/41_GDgjLT7g2.jpg',
    1 => '6a59bfe25c7cd75eb817ceb4',
  ),
  42 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/42_UBxqfV90f.jpg',
    1 => '6a59bfe25c7cd75eb817d0cc',
  ),
  43 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/43_jg-X4A3af.jpg',
    1 => '6a59bfe25c7cd75eb817d185',
  ),
  44 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/44_wv5XTWLRL5.jpg',
    1 => '6a59bfe25c7cd75eb817d3d4',
  ),
  45 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/45_KVCifmrKL.jpg',
    1 => '6a59bfe35c7cd75eb817d534',
  ),
  46 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/46_hZRT6BCmp.jpg',
    1 => '6a59bfe35c7cd75eb817d6f0',
  ),
  47 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/47_1XZLlYvGUy.jpg',
    1 => '6a59bfe35c7cd75eb817d829',
  ),
  48 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/48_kQxkpbE_W4.jpg',
    1 => '6a59bfe45c7cd75eb817da3b',
  ),
  49 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/49_9S3QIjRPE.jpg',
    1 => '6a59bfe45c7cd75eb817dbc9',
  ),
  50 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/50_rDvSUcr34J.jpg',
    1 => '6a59bfe45c7cd75eb817ddd6',
  ),
  51 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/51_E6whtRQeZK.jpg',
    1 => '6a59bfe45c7cd75eb817dff4',
  ),
  52 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/52_0PXGxtCTp.jpg',
    1 => '6a59bfe55c7cd75eb817e106',
  ),
  53 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/53_GWpLrdeFxl.jpg',
    1 => '6a59bfe55c7cd75eb817e302',
  ),
  54 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/54_YHvZQmPbw.jpg',
    1 => '6a59bfe55c7cd75eb817e3ec',
  ),
  55 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/55_XwO3VFkBRv.jpg',
    1 => '6a59bfe65c7cd75eb817e65d',
  ),
  56 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/56_OvGgSKYTk.jpg',
    1 => '6a59bfe65c7cd75eb817e788',
  ),
  57 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/57_z-y9l7VR0.jpg',
    1 => '6a59bfe65c7cd75eb817e95b',
  ),
  58 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/58_b2Vus2NjJP.jpg',
    1 => '6a59bfe75c7cd75eb817ec18',
  ),
  59 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/59_M4ioK5oQ-.jpg',
    1 => '6a59bfe75c7cd75eb817eccc',
  ),
  60 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/60_Ie70_52Wj.jpg',
    1 => '6a59bfe75c7cd75eb817ef7a',
  ),
  61 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/61_aHvkZtb9Tf.jpg',
    1 => '6a59bfe75c7cd75eb817f122',
  ),
  62 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/62_sX4lcAdqe.jpg',
    1 => '6a59bfe85c7cd75eb817f32b',
  ),
  63 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/63_Pdo3SNL6cQ.jpg',
    1 => '6a59bfe85c7cd75eb817f581',
  ),
  64 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/64_yRm7fTvBI.jpg',
    1 => '6a59bfe85c7cd75eb817f6d2',
  ),
  65 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/65_Xq6cOudmM.jpg',
    1 => '6a59bfe95c7cd75eb817f978',
  ),
  66 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/66_rd-Qg6w2B.jpg',
    1 => '6a59bfe95c7cd75eb817fc3f',
  ),
  67 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/67_BcTQZ3sPGh.jpg',
    1 => '6a59bfea5c7cd75eb817ff01',
  ),
  68 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/68_B3p1DJB3Q.jpg',
    1 => '6a59bfea5c7cd75eb8180096',
  ),
  69 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/69_UWa3AxXkx.jpg',
    1 => '6a59bfea5c7cd75eb81802db',
  ),
  70 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/70_vaiOxgZ9fE.jpg',
    1 => '6a59bfea5c7cd75eb81804d4',
  ),
  71 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/71_6NoSG8wzNr.jpg',
    1 => '6a59bfeb5c7cd75eb818075f',
  ),
  72 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/72_8OluFMnvb.jpg',
    1 => '6a59bfeb5c7cd75eb81809ac',
  ),
  73 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/73_K2DfEvDU8.jpg',
    1 => '6a59bfeb5c7cd75eb8180c17',
  ),
  74 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/74_ci7Y6P88A.jpg',
    1 => '6a59bfec5c7cd75eb8180cf7',
  ),
  75 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/75_eiA-Bpwxt.jpg',
    1 => '6a59bfec5c7cd75eb8180f59',
  ),
  76 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/76_fDgpobIpA.jpg',
    1 => '6a59bfec5c7cd75eb8181149',
  ),
  77 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/77_AJypBLJnr4.jpg',
    1 => '6a59bfed5c7cd75eb81813c4',
  ),
  78 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/78_pcLwfd8_K.jpg',
    1 => '6a59bfed5c7cd75eb81817f9',
  ),
  79 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/79_AfF07q-98.jpg',
    1 => '6a59bfed5c7cd75eb818193f',
  ),
  80 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/80_1eR6LB8h35.jpg',
    1 => '6a59bfee5c7cd75eb8181f6c',
  ),
  81 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/81_fqrZ0LSES.jpg',
    1 => '6a59bfee5c7cd75eb81825b1',
  ),
  82 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/82_v1KvxXHPe.jpg',
    1 => '6a59bfee5c7cd75eb8182972',
  ),
  83 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/83_hwaG28yb8.jpg',
    1 => '6a59bfef5c7cd75eb8182d48',
  ),
  84 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/84_rhXftISZZT.jpg',
    1 => '6a59bfef5c7cd75eb818300f',
  ),
  85 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/85__vUHRuQzk.jpg',
    1 => '6a59bfef5c7cd75eb8183381',
  ),
  86 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/86_UJwhhn9ak.jpg',
    1 => '6a59bff05c7cd75eb81835d9',
  ),
  87 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/87_JrmnNM1hp-.jpg',
    1 => '6a59bff05c7cd75eb818387d',
  ),
  88 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/88_s1spu1SRW.jpg',
    1 => '6a59bff05c7cd75eb8183a4c',
  ),
  89 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/89_Dssl3N5lT.jpg',
    1 => '6a59bff15c7cd75eb8183cfc',
  ),
  90 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/90_AGSb7-CUe.jpg',
    1 => '6a59bff15c7cd75eb81840bc',
  ),
  91 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/91_Fr2ueCQHIs.jpg',
    1 => '6a59bff15c7cd75eb818432b',
  ),
  92 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/92_05nb-RjG7.jpg',
    1 => '6a59bff25c7cd75eb81846fd',
  ),
  93 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/93_jJOV8aNji.jpg',
    1 => '6a59bff25c7cd75eb81849ba',
  ),
  94 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/94_P-8-QFeQAk.jpg',
    1 => '6a59bff25c7cd75eb8184c4f',
  ),
  95 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/95_XGos61MrZ.jpg',
    1 => '6a59bff35c7cd75eb8184f2e',
  ),
  96 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/96_nIaJf2PcG.jpg',
    1 => '6a59bff35c7cd75eb81851a1',
  ),
  97 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/97_vg23toH_dV.jpg',
    1 => '6a59bff35c7cd75eb818537d',
  ),
  98 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/98_LuEiqQk11.jpg',
    1 => '6a59bff45c7cd75eb8185640',
  ),
  99 => 
  array (
    0 => 'https://ik.imagekit.io/kiwanoinc/fatimahproject/99_Rd4iCjHqt.jpg',
    1 => '6a59bff45c7cd75eb8185a5f',
  ),
);

        foreach ($items as $sortOrder => [$url, $fileId]) {
            Portfolio::updateOrCreate(
                ["sort_order" => $sortOrder],
                [
                    "image" => $url,
                    "image_file_id" => $fileId,
                    "is_active" => true,
                ]
            );
        }
    }
}
