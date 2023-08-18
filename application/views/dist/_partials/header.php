<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
        <!-- CSS files -->
        <link href="<?= base_url()?>/dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
        <link href="<?= base_url()?>/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
        <link href="<?= base_url()?>/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
        <link href="<?= base_url()?>/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
        <link href="<?= base_url()?>/dist/css/demo.min.css?1684106062" rel="stylesheet"/>
        <link href="<?= base_url()?>/dist/css/inter.css?1684106062" rel="stylesheet"/>
        <style>
        /* @import url('https://rsms.me/inter/inter.css'); */
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
        </style>
    </head>
    <body class="layout-fluid">
        <script src="<?= base_url()?>/dist/js/demo-theme.min.js?1684106062"></script>

        <!-- Page -->
        <div class="page">

            <!-- Sticky -->
            <div class="sticky-top">

                <!-- Navbar -->
                <header class="navbar navbar-expand-md d-print-none">
                    <div class="container-xl">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                            <a href="<?= site_url()?>">
                                <img src="<?= base_url()?>/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                            </a>
                        </h1>
                        <div class="navbar-nav flex-row order-md-last">
                            <div class="nav-item d-none d-md-flex me-3">

                            </div>
                            <div class="d-none d-md-flex">
                                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
                                data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                                </a>
                                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
                                data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                                </a>
                                <div class="nav-item dropdown d-none d-md-flex me-3">
                                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                                        <span class="badge bg-red"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Last updates</h3>
                                            </div>
                                            <div class="list-group list-group-flush list-group-hoverable">
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-body d-block">Example 1</a>
                                                            <div class="d-block text-muted text-truncate mt-n1">
                                                                Change deprecated html tags to text decoration classes (#29604)
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="#" class="list-group-item-actions">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-body d-block">Example 2</a>
                                                            <div class="d-block text-muted text-truncate mt-n1">
                                                                justify-content:between ⇒ justify-content:space-between (#29734)
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="#" class="list-group-item-actions show">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-body d-block">Example 3</a>
                                                            <div class="d-block text-muted text-truncate mt-n1">
                                                                Update change-version.js (#29736)
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="#" class="list-group-item-actions">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-body d-block">Example 4</a>
                                                            <div class="d-block text-muted text-truncate mt-n1">
                                                                Regenerate package-lock.json (#29730)
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <a href="#" class="list-group-item-actions">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                    <span class="avatar avatar-sm" style="background-image: url(<?= base_url() ?>/static/avatars/000m.jpg)"></span>
                                    <div class="d-none d-xl-block ps-2">
                                        <div>Paweł Kuna</div>
                                        <div class="mt-1 small text-muted">UI Designer</div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <a href="#" class="dropdown-item">Status</a>
                                    <a href="<?= site_url()?>/profile.html" class="dropdown-item">Profile</a>
                                    <a href="#" class="dropdown-item">Feedback</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?= site_url()?>/settings.html" class="dropdown-item">Settings</a>
                                    <a href="<?= site_url()?>/sign-in.html" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Menu -->
                <header class="navbar-expand-md">
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <div class="navbar">
                            <div class="container-xl">
                                <ul class="navbar-nav">

                                    <!-- Menu Home -->
                                    <li class="nav-item active">
                                        <a class="nav-link" href="<?= base_url()?>" >
                                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Beranda
                                            </span>
                                        </a>
                                    </li>

                                    <!-- Menu Master -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Master
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="<?= site_url('t00_mata_uang') ?>">
                                                        Mata Uang
                                                    </a>
                                                    <div class="dropend">
                                                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                                            Pembayaran
                                                        </a>
                                                        <div class="dropdown-menu">
                                                            <a href="<?= site_url('t01_jenis_pembayaran') ?>" class="dropdown-item">
                                                                Jenis Pembayaran
                                                            </a>
                                                            <a href="<?= site_url('t02_jenis_selisih_pembayaran') ?>" class="dropdown-item">
                                                                Jenis Selisih Pembayaran
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <a class="dropdown-item" href="<?= site_url('t03_periode') ?>">
                                                        Periode
                                                    </a>
                                                    <a class="dropdown-item" href="<?= site_url('t04_package') ?>">
                                                        Package
                                                    </a>
                                                    <a class="dropdown-item" href="<?= site_url('t05_agent') ?>">
                                                        Agent
                                                    </a>
                                                    <a class="dropdown-item" href="<?= site_url('t06_country') ?>">
                                                        Country
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Menu Transaksi -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11l3 3l8 -8" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Transaksi
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="<?= site_url('t30_bkm') ?>">
                                                        BKM
                                                    </a>
                                                    <a class="dropdown-item" href="<?= site_url('00_mata_uang') ?>">
                                                        Pembayaran
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- Menu Setting -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                   <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                                   <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Setting
                                            </span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div class="dropdown-menu-columns">
                                                <div class="dropdown-menu-column">
                                                    <a class="dropdown-item" href="<?= site_url('t07_kolom_payment') ?>">
                                                        Kolom Payment
                                                    </a>
                                                    <a class="dropdown-item" href="<?= site_url('t09_catatan') ?>">
                                                        Catatan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </header>

            </div>

            <div class="page-wrapper">
