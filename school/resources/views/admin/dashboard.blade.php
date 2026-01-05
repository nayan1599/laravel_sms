@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">{{ $totalStudents }} </p>
                <p class="stat-cards-info__title">Total Students</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>4.07%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">{{ $totalTeachers }} </p>
                <p class="stat-cards-info__title">Total Teachers</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>0.24%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon purple">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">{{ $totalEmployees }}</p>
                <p class="stat-cards-info__title">Total Employees</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down" aria-hidden="true"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>1.64%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon success">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather" aria-hidden="true"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">1478 286</p>
                <p class="stat-cards-info__title">Total visits</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>0.00%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <div class="chart">
              <canvas id="myChart" aria-label="Site statistics" role="img" style="display: block; box-sizing: border-box; height: 370px; width: 1087.5px;" width="870" height="296"></canvas>
            </div>
            <div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th>
                      <label class="users-table__checkbox ms-20">
                        <input type="checkbox" class="check-all">Thumbnail
                      </label>
                    </th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <picture><source srcset="./img/categories/01.webp" type="image/webp"><img src="./img/categories/01.jpg" alt="category"></picture>
                        </div>
                      </label>
                    </td>
                    <td>
                      Starting your traveling blog with Vasco
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="./img/avatar/avatar-face-04.webp" type="image/webp"><img src="./img/avatar/avatar-face-04.png" alt="User Name"></picture>
                        Jenny Wilson
                      </div>
                    </td>
                    <td><span class="badge-pending">Pending</span></td>
                    <td>17.04.2021</td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="##">Edit</a></li>
                          <li><a href="##">Quick edit</a></li>
                          <li><a href="##">Trash</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <picture><source srcset="./img/categories/02.webp" type="image/webp"><img src="./img/categories/02.jpg" alt="category"></picture>
                        </div>
                      </label>
                    </td>
                    <td>
                      Start a blog to reach your creative peak
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name"></picture>
                        Annette Black
                      </div>
                    </td>
                    <td><span class="badge-pending">Pending</span></td>
                    <td>23.04.2021</td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="##">Edit</a></li>
                          <li><a href="##">Quick edit</a></li>
                          <li><a href="##">Trash</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <picture><source srcset="./img/categories/03.webp" type="image/webp"><img src="./img/categories/03.jpg" alt="category"></picture>
                        </div>
                      </label>
                    </td>
                    <td>
                      Helping a local business reinvent itself
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="./img/avatar/avatar-face-02.webp" type="image/webp"><img src="./img/avatar/avatar-face-02.png" alt="User Name"></picture>
                        Kathryn Murphy
                      </div>
                    </td>
                    <td><span class="badge-active">Active</span></td>
                    <td>17.04.2021</td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="##">Edit</a></li>
                          <li><a href="##">Quick edit</a></li>
                          <li><a href="##">Trash</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <picture><source srcset="./img/categories/04.webp" type="image/webp"><img src="./img/categories/04.jpg" alt="category"></picture>
                        </div>
                      </label>
                    </td>
                    <td>
                      Caring is the new marketing
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="./img/avatar/avatar-face-05.webp" type="image/webp"><img src="./img/avatar/avatar-face-05.png" alt="User Name"></picture>
                        Guy Hawkins
                      </div>
                    </td>
                    <td><span class="badge-active">Active</span></td>
                    <td>17.04.2021</td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="##">Edit</a></li>
                          <li><a href="##">Quick edit</a></li>
                          <li><a href="##">Trash</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <picture><source srcset="./img/categories/01.webp" type="image/webp"><img src="./img/categories/01.jpg" alt="category"></picture>
                        </div>
                      </label>
                    </td>
                    <td>
                      How to build a loyal community online and offline
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name"></picture>
                        Robert Fox
                      </div>
                    </td>
                    <td><span class="badge-active">Active</span></td>
                    <td>17.04.2021</td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="##">Edit</a></li>
                          <li><a href="##">Quick edit</a></li>
                          <li><a href="##">Trash</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                        <div class="categories-table-img">
                          <picture><source srcset="./img/categories/03.webp" type="image/webp"><img src="./img/categories/03.jpg" alt="category"></picture>
                        </div>
                      </label>
                    </td>
                    <td>
                      How to build a loyal community online and offline
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img src="./img/avatar/avatar-face-03.png" alt="User Name"></picture>
                        Robert Fox
                      </div>
                    </td>
                    <td><span class="badge-active">Active</span></td>
                    <td>17.04.2021</td>
                    <td>
                      <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="More info">
                          <div class="sr-only">More info</div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal" aria-hidden="true"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                          <li><a href="##">Edit</a></li>
                          <li><a href="##">Quick edit</a></li>
                          <li><a href="##">Trash</a></li>
                        </ul>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-lg-3">
            <article class="customers-wrapper">
              <canvas id="customersChart" aria-label="Customers statistics" role="img" width="279" height="120" style="display: block; box-sizing: border-box; height: 150px; width: 348.75px;"></canvas>
              <!--              <p class="customers__title">New Customers <span>+958</span></p>
              <p class="customers__date">28 Daily Avg.</p>
              <picture><source srcset="./img/svg/customers.svg" type="image/webp"><img src="./img/svg/customers.svg" alt=""></picture> -->
            </article>
            <article class="white-block">
              <div class="top-cat-title">
                <h3>Top categories</h3>
                <p>28 Categories, 1400 Posts</p>
              </div>
              <ul class="top-cat-list">
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      Lifestyle <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Dailiy lifestyle articles <span class="purple">+472</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      Tutorials <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Coding tutorials <span class="blue">+472</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      Technology <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Dailiy technology articles <span class="danger">+472</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      UX design <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      UX design tips <span class="success">+472</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      Interaction tips <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Interaction articles <span class="warning">+472</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      App development <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Mobile development articles <span class="warning">+472</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      Nature <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Wildlife animal articles <span class="warning">+472</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="top-cat-list__title">
                      Geography <span>8.2k</span>
                    </div>
                    <div class="top-cat-list__subtitle">
                      Geography articles <span class="primary">+472</span>
                    </div>
                  </a>
                </li>
              </ul>
            </article>
          </div>
        </div>
      </div>
@endsection
