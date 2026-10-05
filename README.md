
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
│  ├─ Helpers
│  │  └─ PhoneHelper.php
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
│  │  │  │  ├─ UmkmController.php
│  │  │  │  └─ WargaController.php
│  │  │  ├─ Rw
│  │  │  │  ├─ AkunRtController.php
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
│  ├─ images
│  │  ├─ hero-bg.jpg
│  │  └─ logo.png
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
│     ├─ layouts
│     │  └─ app.blade.php
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
│     │  ├─ umkm
│     │  │  └─ index.blade.php
│     │  └─ warga
│     │     └─ index.blade.php
│     ├─ rw
│     │  ├─ akun-rt
│     │  │  ├─ edit.blade.php
│     │  │  ├─ index.blade.php
│     │  │  └─ reset-password.blade.php
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
│  │     ├─ hero
│  │     │  └─ back.jpg
│  │     ├─ informasi
│  │     │  ├─ 5kZszlY5ScnAKQCAvW301yxIAqbQtvj6fosRzISt.png
│  │     │  ├─ DnGSnQXbEur4gNWhYvcIw39yQMZ7gr6fa64vQKHe.png
│  │     │  ├─ FzR9BPGZIpsX1n6EFM5yZV77H5oh3gEDmfgvuaDO.png
│  │     │  ├─ k0UkisVkvcxumuk9Cxl4B699XAplv5eFLw19kaPZ.png
│  │     │  ├─ mBOpnQ36Kgr1qiYgwTtTwyYhYMvDonfg59vmMcpG.png
│  │     │  ├─ NuXKpwb3sN1N8jQJEBfY3wIKNyLDihXSzIxJXaP1.png
│  │     │  ├─ pebenZIa1HVLouvjGQT5hY3WLoWMOlu8odx4cf6a.png
│  │     │  ├─ PjkBnr5toXVHe1ADIL6h8Tah86nVZQBDsH3YXuQ8.png
│  │     │  └─ yVRttwYyTmfp8eXiMu5To5x3eq6rf4ESRkovvFx8.jpg
│  │     ├─ kegiatan
│  │     │  ├─ 9u94wt2yt9o8rUPWGJwAeQ4FPYBTCKjeyLtx4gF3.png
│  │     │  ├─ BUdzlgS3KWh348gA8W2KkD7ZjIkFGbJSQvgcVILh.png
│  │     │  └─ zCcOjeL7hdz6BCQ0YhoMFzVsQPww2TFvkIJxiOZB.png
│  │     ├─ logo
│  │     │  └─ logo.png
│  │     ├─ pengaduan
│  │     │  ├─ 29veYhadZA1gzaRYooPhC2QAbQcoDe5nAv5lpSMn.png
│  │     │  ├─ Hwn9zWGhkGsRJhPb792NMzVW9ysbNFM41hX8LN4k.png
│  │     │  ├─ j9KJyjG8XK7E8ZwZHTUdkKXkA7hUJbsZhiY5txyp.png
│  │     │  └─ t5l2KNoBhER5bNXnxXGnK4frJql86jv6Ne4v7d2Y.jpg
│  │     └─ umkm
│  │        ├─ bKEV1b3qmq2ONoV4pILTE0Ny48nYeT8EhtHUIaty.png
│  │        └─ y3RY47Jl6awofL5KgYiK2TFOtXG8KuNPsadqcUnn.jpg
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  │  └─ jlQyoLCarE2AH9Y0mrC4QwtuEHRjC85Ribl7MICB
│  │  ├─ testing
│  │  │  └─ disks
│  │  │     └─ public
│  │  │        └─ umkm
│  │  │           └─ yfI8aCT1qs38CacSzON0PPhMZLooFeXO4WmyI1yl.jpg
│  │  └─ views
│  │     ├─ 0028ca207eba6785f373a3f3ab42e0c6.php
│  │     ├─ 145b603705cd95abc90ba7c8b8355118.php
│  │     ├─ 267bf446baf587783e6754bedd7d3d5a.php
│  │     ├─ 3d3ac016d3010f66aa4c3616762a488c.php
│  │     ├─ 50c0dfd226ad3d178c0d0112a748179f.php
│  │     ├─ 56dab3d87015e304aebf773cf8d8f088.php
│  │     ├─ 60b8be841282247de8ca50d2a26d4c17.php
│  │     ├─ 6e647a3812007a1f91deeff4270873a5.php
│  │     ├─ 6fbab89165b375ee901bd494dfa12827.php
│  │     ├─ b779f5492cbe0e83fc2346299c735858.php
│  │     ├─ c3a9c8d62165705e300adaba1491ae7a.php
│  │     ├─ ca2898fd9a2147080086ece92acbef7c.php
│  │     ├─ cfe3e0c29205047a2e7accd7baafaff2.php
│  │     └─ f942abf62f7d5042290248754ccdc239.php
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