<script>
import { store } from '../../data/store';


export default {
	name: "SearchBar",
	data() {
		return {
			store,
		}
	},
}
</script>


<template>
	<div class="search-bar">
		<div class="search">
			<div class="search-content">
				<div>
					<!-- search icon -->
					<img class="icon w-100" src="" alt="">  
				</div>
				<input type="text" v-model="store.searchBarText" @change="$emit('searchText')" list="dottori"
					placeholder="Cerca Dottore">
			</div>
		</div>
	</div>
</template>


<style lang="scss" scoped>
@use '../../scss/variables' as *;

.active {
	background-color: rgb(2, 37, 26);
	font-weight: bold;
}

.search-bar {
	font-size: 1.125rem;
	transform: translate(3px, -128px);
	width: 70%;

	.search {
		background-color: $third_color;
		border-radius: 3rem;
		padding: 1.2rem 1rem;
		display: flex;

		box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
		.search-content {
			display: flex;
			flex-grow: 1;

			input {
				flex-grow: 1;
				margin: 0 1.1rem;
				outline: none;
				border: none;
				background-color: $third_color;
			}

			.icon {
				height: 1.5rem;
				width: 1.5rem;
			}
		}
	}
}
</style>