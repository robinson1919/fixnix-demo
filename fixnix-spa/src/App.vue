<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <!-- <v-list shaped>
        <template v-for="item in items">
          <v-row
            v-if="item.heading"
            :key="item.heading"
            align="center"
          >
            <v-col cols="6">
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-col>
            <v-col
              cols="6"
              class="text-center"
            >
              <a
                href="#!"
                class="body-2 black--text"
              >EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>
                  {{ item.text }}
                </v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              link
            >
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  {{ child.text }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :key="item.text"
            link
          >
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list> -->
      <v-list rounded>
        <v-list-item-group color="primary">
          <v-list-item
            v-for="(item, i) in items"
            :key="i" :to="item.url"
          >
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title v-text="item.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="secondary"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title
        style="width: 300px"
        class="ml-0 pl-4"
      >
        <span class="hidden-sm-and-down" to="home">
          <v-avatar
            size="150px"
            class="mx-3 mt-3"            
          >
            <img
              :src="require('./assets/fixnix-white-logo.png')"
              alt="FIXNIX"
            >
          </v-avatar>
        </span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
      
      
      
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon
          v-bind="attrs"
          v-on="on">
            <v-icon>mdi-logout</v-icon>
          </v-btn>
        </template>
        <span>Log-out</span>
      </v-tooltip>

    </v-app-bar>
    <v-main>
      <v-container
        fluid
      >
        <v-slide-y-transition mode="out-in">
          <router-view></router-view>
        </v-slide-y-transition>
      </v-container>
    </v-main>   
  </v-app>
</template>

<script>
  export default {
    
    data: () => ({
      dialog: false,
      drawer: null,
      items: [
        { icon: 'mdi-file-document', text: 'Compliance', url: 'compliance' },
        { icon: 'mdi-folder-account-outline', text: 'Regulatory engine', url: 'regularoty_engine' },
        { icon: 'mdi-file-document-edit-outline', text: 'Assesments', url: 'assessment' },
        { icon: 'mdi-animation-outline', text: 'Audit' },
        { icon: 'mdi-alert-outline', text: 'Risk' },
        { icon: 'mdi-content-copy', text: 'Compliance' },
        { icon: 'mdi-shield-home-outline', text: 'Policy'},
        { icon: 'mdi-toy-brick', text: 'Asset' },
        { icon: 'mdi-dna', text: 'Insident' },
        { icon: 'mdi-chart-tree', text: 'Disaster' },
        { icon: 'mdi-account-child-circle', text: 'Bcpm' },
        { icon: 'mdi-monitor-dashboard', text: 'DashBoard' },
      ],
    }),
  }
</script>