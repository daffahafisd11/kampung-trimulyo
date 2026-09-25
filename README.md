
```
kampung-trimulyo
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
│  │  ├─ Controllers_backup
│  │  │  ├─ AuthController.php
│  │  │  ├─ Bendahara
│  │  │  │  └─ KasController.php
│  │  │  ├─ Controller.php
│  │  │  ├─ DashboardController.php
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
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  ├─ testing
│  │  └─ views
│  │     ├─ 0028ca207eba6785f373a3f3ab42e0c6.php
│  │     ├─ 145b603705cd95abc90ba7c8b8355118.php
│  │     ├─ 49ed677cb03421b132837de73cc3620b.php
│  │     ├─ 50c0dfd226ad3d178c0d0112a748179f.php
│  │     ├─ 5774f89adc7a5a7fddc130b911c66c02.php
│  │     ├─ 60b8be841282247de8ca50d2a26d4c17.php
│  │     ├─ 6e647a3812007a1f91deeff4270873a5.php
│  │     ├─ a3618e20067f0f74b905577ba6662d90.php
│  │     ├─ c284a7f31c6580428f382b7786ae9308.php
│  │     ├─ cfe3e0c29205047a2e7accd7baafaff2.php
│  │     └─ f942abf62f7d5042290248754ccdc239.php
│  └─ logs
├─ tests
│  ├─ Feature
│  │  ├─ ExampleTest.php
│  │  └─ RoleDashboardSmokeTest.php
│  ├─ Pest.php
│  ├─ TestCase.php
│  └─ Unit
│     └─ ExampleTest.php
└─ vite.config.js

```