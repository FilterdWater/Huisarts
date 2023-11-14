<!doctype html>
<html lang="en">
  <?php $pagetitle = 'Home'; require_once 'head.php'; ?>
  <body>
    <section class="bg-gray-50">
      <div
        class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center"
      >
        <div class="mx-auto max-w-xl text-center">
          <a
            class="group relative inline-flex items-center overflow-hidden rounded bg-gray-600 px-16 py-6 text-white focus:outline-none focus:ring active:bg-gray-500"
            href="../php/overzichtsPagina.php"
          >
            <span class="absolute -end-full transition-all group-hover:end-4">
              <svg
                class="h-5 w-5 rtl:rotate-180"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 18"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="3"
                  d="M17 8l4 4m0 0l-4 4m4-4H3"
                />
              </svg>
            </span>

            <span class=" text-3xl font-medium transition-all group-hover:me-4">
              Overzichtspagina
            </span>
          </a>
        </div>
      </div>
    </section>
  </body>
</html>
