
```
kampung-trimulyo
├─ 'maya.warga@gmail.com'
├─ .claude
│  └─ skills
│     ├─ deploying-to-cloud
│     │  ├─ reference
│     │  │  └─ checklists.md
│     │  └─ SKILL.md
│     ├─ infer-conventions
│     │  ├─ references
│     │  │  └─ checklist.md
│     │  └─ SKILL.md
│     ├─ laravel-best-practices
│     │  ├─ rules
│     │  │  ├─ advanced-queries.md
│     │  │  ├─ architecture.md
│     │  │  ├─ blade-views.md
│     │  │  ├─ caching.md
│     │  │  ├─ collections.md
│     │  │  ├─ config.md
│     │  │  ├─ db-performance.md
│     │  │  ├─ eloquent.md
│     │  │  ├─ error-handling.md
│     │  │  ├─ events-notifications.md
│     │  │  ├─ http-client.md
│     │  │  ├─ mail.md
│     │  │  ├─ migrations.md
│     │  │  ├─ queue-jobs.md
│     │  │  ├─ routing.md
│     │  │  ├─ scheduling.md
│     │  │  ├─ security.md
│     │  │  ├─ style.md
│     │  │  └─ validation.md
│     │  └─ SKILL.md
│     ├─ tailwindcss-development
│     │  └─ SKILL.md
│     └─ testing-best-practices
│        ├─ rules
│        │  ├─ assertions.md
│        │  ├─ endpoint-tests.md
│        │  ├─ finding-features.md
│        │  ├─ isolation.md
│        │  ├─ naming.md
│        │  ├─ performance.md
│        │  ├─ review.md
│        │  ├─ security.md
│        │  └─ test-data.md
│        └─ SKILL.md
├─ .editorconfig
├─ .npmrc
├─ AGENTS.md
├─ app
│  ├─ Http
│  │  ├─ Controllers
│  │  │  ├─ AuthController.php
│  │  │  ├─ Bendahara
│  │  │  │  └─ KasController.php
│  │  │  ├─ Controller.php
│  │  │  ├─ DashboardController.php
│  │  │  ├─ LandingController.php
│  │  │  ├─ ProfileController.php
│  │  │  ├─ Rt
│  │  │  │  ├─ InformasiController.php
│  │  │  │  ├─ KasController.php
│  │  │  │  ├─ KegiatanController.php
│  │  │  │  ├─ PengaduanController.php
│  │  │  │  └─ UmkmController.php
│  │  │  ├─ Rw
│  │  │  │  ├─ BendaharaController.php
│  │  │  │  ├─ InformasiController.php
│  │  │  │  ├─ KasController.php
│  │  │  │  ├─ KategoriPengaduanController.php
│  │  │  │  ├─ KategoriUmkmController.php
│  │  │  │  ├─ KegiatanController.php
│  │  │  │  ├─ PengaduanController.php
│  │  │  │  ├─ RtController.php
│  │  │  │  ├─ UmkmController.php
│  │  │  │  └─ WargaController.php
│  │  │  └─ Warga
│  │  │     ├─ KasController.php
│  │  │     ├─ PengaduanController.php
│  │  │     ├─ ProfileController.php
│  │  │     └─ UmkmController.php
│  │  └─ Middleware
│  │     ├─ BendaharaMiddleware.php
│  │     └─ RoleMiddleware.php
│  ├─ Mail
│  │  ├─ InformasiBaruMail.php
│  │  └─ KegiatanBaruMail.php
│  ├─ Models
│  │  ├─ Informasi.php
│  │  ├─ KasRt.php
│  │  ├─ KategoriPengaduan.php
│  │  ├─ KategoriUmkm.php
│  │  ├─ Kegiatan.php
│  │  ├─ Pengaduan.php
│  │  ├─ RiwayatPengaduan.php
│  │  ├─ Rt.php
│  │  ├─ Rw.php
│  │  ├─ Umkm.php
│  │  ├─ User.php
│  │  └─ Warga.php
│  └─ Providers
│     └─ AppServiceProvider.php
├─ artisan
├─ boost.json
├─ bootstrap
│  ├─ app.php
│  ├─ cache
│  │  ├─ packages.php
│  │  └─ services.php
│  └─ providers.php
├─ CLAUDE.md
├─ composer.json
├─ composer.lock
├─ config
│  ├─ app.php
│  ├─ auth.php
│  ├─ cache.php
│  ├─ database.php
│  ├─ filesystems.php
│  ├─ logging.php
│  ├─ mail.php
│  ├─ queue.php
│  ├─ services.php
│  └─ session.php
├─ database
│  ├─ database.sqlite
│  ├─ factories
│  │  └─ UserFactory.php
│  ├─ migrations
│  │  ├─ 0001_01_01_000000_create_users_table.php
│  │  ├─ 0001_01_01_000001_create_cache_table.php
│  │  ├─ 0001_01_01_000002_create_jobs_table.php
│  │  ├─ 2026_09_19_122811_create_rw_table.php
│  │  ├─ 2026_09_19_123114_create_rt_table.php
│  │  ├─ 2026_09_19_123357_add_role_to_users_table.php
│  │  ├─ 2026_09_19_123615_create_warga_table.php
│  │  ├─ 2026_09_19_124413_create_kategori_pengaduan_table.php
│  │  ├─ 2026_09_19_124633_create_pengaduan_table.php
│  │  ├─ 2026_09_19_125900_create_riwayat_pengaduan_table.php
│  │  ├─ 2026_09_19_130342_create_kategori_umkm_table.php
│  │  ├─ 2026_09_19_130848_create_umkm_table.php
│  │  ├─ 2026_09_19_172554_create_informasi_table.php
│  │  ├─ 2026_09_20_095021_create_kegiatan_table.php
│  │  ├─ 2026_09_22_052544_add_bendahara_fields_to_users_table.php
│  │  └─ 2026_09_22_053343_create_kas_rt_table.php
│  └─ seeders
│     ├─ DatabaseSeeder.php
│     ├─ KasRtSeeder.php
│     ├─ KategoriPengaduanSeeder.php
│     ├─ KategoriUmkmSeeder.php
│     ├─ RtSeeder.php
│     ├─ RwSeeder.php
│     └─ UserSeeder.php
├─ package-lock.json
├─ package.json
├─ phpunit.xml
├─ public
│  ├─ .htaccess
│  ├─ favicon.ico
│  ├─ index.php
│  └─ robots.txt
├─ README.md
├─ resources
│  ├─ css
│  │  └─ app.css
│  ├─ js
│  │  └─ app.js
│  └─ views
│     ├─ auth
│     │  └─ login.blade.php
│     ├─ bendahara
│     │  └─ kas
│     │     ├─ create.blade.php
│     │     ├─ edit.blade.php
│     │     └─ index.blade.php
│     ├─ dashboard
│     │  ├─ rt.blade.php
│     │  ├─ rw.blade.php
│     │  └─ warga.blade.php
│     ├─ emails
│     │  ├─ informasi-baru.blade.php
│     │  └─ kegiatan-baru.blade.php
│     ├─ landing
│     │  └─ index.blade.php
│     ├─ profile
│     │  └─ change-password.blade.php
│     ├─ rt
│     │  ├─ informasi
│     │  │  ├─ create.blade.php
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ kas
│     │  │  └─ index.blade.php
│     │  ├─ kegiatan
│     │  │  ├─ create.blade.php
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ pengaduan
│     │  │  ├─ index.blade.php
│     │  │  └─ show.blade.php
│     │  └─ umkm
│     │     └─ index.blade.php
│     ├─ rw
│     │  ├─ bendahara
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ informasi
│     │  │  ├─ create.blade.php
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ kas
│     │  │  └─ index.blade.php
│     │  ├─ kategori-pengaduan
│     │  │  ├─ create.blade.php
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ kategori-umkm
│     │  │  ├─ create.blade.php
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ kegiatan
│     │  │  ├─ create.blade.php
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ pengaduan
│     │  │  ├─ index.blade.php
│     │  │  └─ show.blade.php
│     │  ├─ rt
│     │  │  ├─ create.blade.php
│     │  │  ├─ edit.blade.php
│     │  │  └─ index.blade.php
│     │  ├─ umkm
│     │  │  ├─ index.blade.php
│     │  │  └─ show.blade.php
│     │  └─ warga
│     │     ├─ create.blade.php
│     │     ├─ edit.blade.php
│     │     └─ index.blade.php
│     └─ warga
│        ├─ kas
│        │  └─ index.blade.php
│        ├─ pengaduan
│        │  ├─ create.blade.php
│        │  ├─ edit.blade.php
│        │  ├─ index.blade.php
│        │  └─ show.blade.php
│        ├─ profile
│        │  └─ edit.blade.php
│        └─ umkm
│           ├─ create.blade.php
│           ├─ edit.blade.php
│           ├─ index.blade.php
│           └─ show.blade.php
├─ routes
│  ├─ console.php
│  └─ web.php
├─ storage
│  ├─ app
│  │  ├─ private
│  │  └─ public
│  │     ├─ informasi
│  │     │  ├─ DnGSnQXbEur4gNWhYvcIw39yQMZ7gr6fa64vQKHe.png
│  │     │  ├─ FzR9BPGZIpsX1n6EFM5yZV77H5oh3gEDmfgvuaDO.png
│  │     │  ├─ k0UkisVkvcxumuk9Cxl4B699XAplv5eFLw19kaPZ.png
│  │     │  ├─ mBOpnQ36Kgr1qiYgwTtTwyYhYMvDonfg59vmMcpG.png
│  │     │  └─ PjkBnr5toXVHe1ADIL6h8Tah86nVZQBDsH3YXuQ8.png
│  │     ├─ kegiatan
│  │     │  └─ 9u94wt2yt9o8rUPWGJwAeQ4FPYBTCKjeyLtx4gF3.png
│  │     └─ pengaduan
│  │        └─ t5l2KNoBhER5bNXnxXGnK4frJql86jv6Ne4v7d2Y.jpg
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  │  ├─ 9ZF0okKaVu5mg8U2hbqLulDzWwiY5W8EW74wFsxA
│  │  │  ├─ a9lPsFdw0Mur4N6QHoKggEDb5btYCHeU4S1ClXrj
│  │  │  └─ BUPfw0FMgt23Cu5mziap9MHWmr9O51nU1aVFDYwt
│  │  ├─ testing
│  │  │  └─ disks
│  │  │     └─ public
│  │  │        └─ umkm
│  │  │           └─ yfI8aCT1qs38CacSzON0PPhMZLooFeXO4WmyI1yl.jpg
│  │  └─ views
│  │     ├─ 145b603705cd95abc90ba7c8b8355118.php
│  │     ├─ 3d3ac016d3010f66aa4c3616762a488c.php
│  │     ├─ 50c0dfd226ad3d178c0d0112a748179f.php
│  │     ├─ 6fbab89165b375ee901bd494dfa12827.php
│  │     ├─ 90b886785ffdb3b857bfb990604db490.php
│  │     ├─ 9c149e6b68000682aa4b5590a9ef8464.php
│  │     ├─ b779f5492cbe0e83fc2346299c735858.php
│  │     ├─ c3a9c8d62165705e300adaba1491ae7a.php
│  │     └─ cfe3e0c29205047a2e7accd7baafaff2.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  ├─ ExampleTest.php
│  │  ├─ RoleDashboardSmokeTest.php
│  │  ├─ RtInformasiTest.php
│  │  ├─ RtKegiatanTest.php
│  │  ├─ RwInformasiTest.php
│  │  ├─ RwListPagesTest.php
│  │  ├─ WargaPengaduanTest.php
│  │  └─ WargaUmkmTest.php
│  ├─ Pest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```