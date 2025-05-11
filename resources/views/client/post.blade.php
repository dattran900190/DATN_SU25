@extends('layouts.ClientLayout')

@section('title-page')
    {{-- {{ $titlePage }} --}}
    Tin tức Baber House
@endsection

@section('content')
 <main class="container">
      <div class="main-posts">
        <h2>Tin tức</h2>
        <div class="posts-content">
          <div class="post-left">
            <div class="post-top">
              <div class="image-top">
                <a href="/detailPost.html">
                  <img src="https://kenh14cdn.com/2020/6/5/photo-1-15913191386161819866915.jpg" alt="" />
                </a>
              </div>
              <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>

            <div class="post-mid">
              <div class="post">
                <div class="image-mid">
                  <a href="/detailPost.html">
                    <img src="/img/chân dung mục tiêu KHang.png" alt="" />
                  </a>
                </div>
                <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              </div>
              <div class="post">
                <div class="image-mid">
                  <a href="/detailPost.html">
                    <img src="/img/chân dung mục tiêu KHang.png" alt="" />
                  </a>
                </div>
                <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              </div>
              <div class="post">
                <div class="image-mid">
                  <a href="/detailPost.html">
                    <img src="/img/chân dung mục tiêu KHang.png" alt="" />
                  </a>
                </div>
                <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              </div>
              <div class="post">
                <div class="image-mid">
                  <a href="/detailPost.html">
                    <img src="/img/chân dung mục tiêu KHang.png" alt="" />
                  </a>
                </div>
                <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              </div>
              <div class="post">
                <div class="image-mid">
                  <a href="/detailPost.html">
                    <img src="/img/chân dung mục tiêu KHang.png" alt="" />
                  </a>
                </div>
                <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              </div>
              <div class="post">
                <div class="image-mid">
                  <a href="/detailPost.html">
                    <img src="/img/chân dung mục tiêu KHang.png" alt="" />
                  </a>
                </div>
                <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              </div>
              <div class="post">
                <div class="image-mid">
                  <a href="/detailPost.html">
                    <img src="/img/chân dung mục tiêu KHang.png" alt="" />
                  </a>
                </div>
                <h4><a href="/detailPost.html">Tiêu đề post</a></h4>
              </div>
            </div>
          </div>

          <div class="post-right">
            <div class="post">
              <div class="image-right">
                <a href="/detailPost.html">
                  <img src="/img/Mô hình kinh doanh BMC.png" alt="" />
                </a>
              </div>
              <h5><a href="/detailPost.html">Tiêu đề</a></h5>
            </div>
            <div class="post">
              <div class="image-right">
                <a href="/detailPost.html">
                  <img src="/img/Mô hình kinh doanh BMC.png" alt="" />
                </a>
              </div>
              <h5><a href="/detailPost.html">Tiêu đề</a></h5>
            </div>
            <div class="post">
              <div class="image-right">
                <a href="/detailPost.html">
                  <img src="/img/Mô hình kinh doanh BMC.png" alt="" />
                </a>
              </div>
              <h5><a href="/detailPost.html">Tiêu đề</a></h5>
            </div>
            <div class="post">
              <div class="image-right">
                <a href="/detailPost.html">
                  <img src="/img/Mô hình kinh doanh BMC.png" alt="" />
                </a>
              </div>
              <h5><a href="/detailPost.html">Tiêu đề</a></h5>
            </div>
            <div class="post">
              <div class="image-right">
                <a href="/detailPost.html">
                  <img src="/img/Mô hình kinh doanh BMC.png" alt="" />
                </a>
              </div>
              <h5><a href="/detailPost.html">Tiêu đề</a></h5>
            </div>
          </div>
        </div>
      </div>
    </main>
    <style>
      #mainNav {
        background-color: #000;
      }
    </style>
@endsection

@section('card-footer')
    {{-- {{ $sanPhams->links() }} --}}
@endsection

<script>
  const nav = document.getElementById("mainNav");

    window.addEventListener("scroll", () => {
      if (window.scrollY = 100) {
        nav.classList.add("scrolled");
      } else {
        nav.classList.remove("scrolled");
      }
    });
</script>
