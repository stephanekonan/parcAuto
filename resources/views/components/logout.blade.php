<form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="text-red-800 inline-flex w-full justify-center bg-red-100 hover:bg-red-200 hover:text-red-800 focus:outline-none font-bold rounded-lg text-md px-5 py-2.5 text-center">
        Se déconnecter
    </button>
</form>
