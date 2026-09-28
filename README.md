
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
│  │     │  ├─ 5kZszlY5ScnAKQCAvW301yxIAqbQtvj6fosRzISt.png
│  │     │  ├─ DnGSnQXbEur4gNWhYvcIw39yQMZ7gr6fa64vQKHe.png
│  │     │  ├─ FzR9BPGZIpsX1n6EFM5yZV77H5oh3gEDmfgvuaDO.png
│  │     │  ├─ k0UkisVkvcxumuk9Cxl4B699XAplv5eFLw19kaPZ.png
│  │     │  ├─ mBOpnQ36Kgr1qiYgwTtTwyYhYMvDonfg59vmMcpG.png
│  │     │  ├─ pebenZIa1HVLouvjGQT5hY3WLoWMOlu8odx4cf6a.png
│  │     │  ├─ PjkBnr5toXVHe1ADIL6h8Tah86nVZQBDsH3YXuQ8.png
│  │     │  └─ yVRttwYyTmfp8eXiMu5To5x3eq6rf4ESRkovvFx8.jpg
│  │     ├─ kegiatan
│  │     │  ├─ 9u94wt2yt9o8rUPWGJwAeQ4FPYBTCKjeyLtx4gF3.png
│  │     │  ├─ BUdzlgS3KWh348gA8W2KkD7ZjIkFGbJSQvgcVILh.png
│  │     │  └─ zCcOjeL7hdz6BCQ0YhoMFzVsQPww2TFvkIJxiOZB.png
│  │     └─ pengaduan
│  │        └─ t5l2KNoBhER5bNXnxXGnK4frJql86jv6Ne4v7d2Y.jpg
│  ├─ framework
│  │  ├─ cache
│  │  │  └─ data
│  │  ├─ sessions
│  │  │  └─ bbEOs7W3mhYqGZwNVU5wgVqRIuN63fV41JdiwQEp
│  │  ├─ testing
│  │  │  └─ disks
│  │  │     └─ public
│  │  │        └─ umkm
│  │  │           └─ yfI8aCT1qs38CacSzON0PPhMZLooFeXO4WmyI1yl.jpg
│  │  └─ views
│  │     ├─ 01529e8d79a77b45f1c5748291ead15b.php
│  │     ├─ 0c8614ebf5cb6d723854aadf5fe29f49.php
│  │     ├─ 114c35111ad2da3350da4cf570f0af4e.php
│  │     ├─ 145b603705cd95abc90ba7c8b8355118.php
│  │     ├─ 1afa4a36958484405b9bf95c652a8c29.php
│  │     ├─ 22958292f5ffd107f609f14fb26387d1.php
│  │     ├─ 2582499988de6ddf0c53866ae29fd79b.php
│  │     ├─ 2bda14ae673f75579e55a2e1221559ac.php
│  │     ├─ 2d3a2420d8fcba81c843adaf26aed5f1.php
│  │     ├─ 2f152848b22dc3e52d70ecf136075da8.php
│  │     ├─ 2f6c29e1ba51be3bc73470a349e15b0c.php
│  │     ├─ 32c9db10736a9ad5df8332b5816d2213.php
│  │     ├─ 3d3ac016d3010f66aa4c3616762a488c.php
│  │     ├─ 3fa61aa8a2abe7ed36ba69df87419f2a.php
│  │     ├─ 4194cf1b857f42f112ff070aa6bead98.php
│  │     ├─ 4865acf9d67c59bafad81f023e377c56.php
│  │     ├─ 489199cb1c01e9b43dc21a7b7b05ab07.php
│  │     ├─ 49ed677cb03421b132837de73cc3620b.php
│  │     ├─ 4d2f2e64ed3fc204035933634fea5da1.php
│  │     ├─ 50c0dfd226ad3d178c0d0112a748179f.php
│  │     ├─ 5c02d3c7e2660311df585eec20e7ff18.php
│  │     ├─ 60b8be841282247de8ca50d2a26d4c17.php
│  │     ├─ 60d52124c1afd02561c759d26bc1aa18.php
│  │     ├─ 63248dd66ae168bac65dff8bdd0053de.php
│  │     ├─ 6fbab89165b375ee901bd494dfa12827.php
│  │     ├─ 76df6d6f8c59a60cbf6af9a83d5e3c9b.php
│  │     ├─ 79356ba1b01186a5dc3bafc1ef41b005.php
│  │     ├─ 7a81e034f3e338ccf4aa7c8e7a3a589a.php
│  │     ├─ 7ac5f80fe29ffb98a5da6e5e9a93d89d.php
│  │     ├─ 7b3c336d3fa201111bd94fbb09a7c791.php
│  │     ├─ 7bc15356d200ece8864b22e4543d27ca.php
│  │     ├─ 7ed8deb1e3f008d63519049129bc2244.php
│  │     ├─ 7f3a084cf4a79e9f99dc16ee7e800aaa.php
│  │     ├─ 8cfca3614cf3a61ebbee443a7de2b0c4.php
│  │     ├─ 8f0a91198d9ede4a382fbe99716f975b.php
│  │     ├─ 90b886785ffdb3b857bfb990604db490.php
│  │     ├─ 96a2a40ca19714816213cdc2e82f120c.php
│  │     ├─ 9bb3837fb16a1027d982f5a3ef576316.php
│  │     ├─ 9c149e6b68000682aa4b5590a9ef8464.php
│  │     ├─ a21cc036aef3f5128d77151c9fa30be5.php
│  │     ├─ a6086a519b71f687475c6b665d6ec3ad.php
│  │     ├─ ac1d51b65ba5feed91b16d0ee954cd79.php
│  │     ├─ add877a4dc6ddae1ce8d716af1eff5ca.php
│  │     ├─ b779f5492cbe0e83fc2346299c735858.php
│  │     ├─ bd28d87132f6e75e26825b1329c5e5a9.php
│  │     ├─ c241f07903abb6d9c4863e3ff373b10c.php
│  │     ├─ c284a7f31c6580428f382b7786ae9308.php
│  │     ├─ c3a9c8d62165705e300adaba1491ae7a.php
│  │     ├─ c3e8af669a4be87328277b5a769683b7.php
│  │     ├─ c3f038802fe0aa0c33681f8f784af425.php
│  │     ├─ ca2898fd9a2147080086ece92acbef7c.php
│  │     ├─ cbca26191deae33742e021e1dcd549e9.php
│  │     ├─ ce50d361fb403d7736e1ce1ebac1c14a.php
│  │     ├─ cebdb2036169d19d502ff2dc0fd4f74d.php
│  │     ├─ cfe3e0c29205047a2e7accd7baafaff2.php
│  │     ├─ d000331d52ac75c267ef4ef185fef622.php
│  │     ├─ d07f0e89c4065155d44d0006365d75f6.php
│  │     ├─ d68309f1d8c82ee330f8e5cb0ab80242.php
│  │     ├─ e7dcbbbce56a9e5cbecab21867a68597.php
│  │     ├─ e929808fee2eb6930bff39f9cb0feb16.php
│  │     ├─ efe48da34584c6e00fd5ac9c1e519f44.php
│  │     └─ f21404999bd80a6dff567e5b969cbddf.php
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